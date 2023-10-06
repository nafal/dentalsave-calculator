<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\UsualFee;
use DentalCalculator\Procedure;
use DentalCalculator\Course;
use DentalCalculator\PrefixNetwork;
use DentalCalculator\Network;
use DentalCalculator\Pincode;
use DentalCalculator\DentalFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Helper;
use Session;
class UsualFeeController extends Controller
{

   public function __construct(){
   
   


    $this->middleware('auth');
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $data = UsualFee::orderBy('id', 'desc')->paginate(10);
            return view('usualfee.index')->with('data',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
          $procedures = Procedure::pluck('name', 'id');
          $ds_networks = Network::pluck('network_code','id');
          $pin = Pincode::pluck('pin_code','id');
          
        return view('usualfee.create',compact('procedures','ds_networks','pin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
            $this->validate($request, [
            'procedure_id' => 'required',
            'course_id' => 'required',
            'network_id' => 'required',
            'pin' => 'required',
            'fees' => 'required|numeric',
            'dental_fees' => 'required|numeric',
           
            ]);

            if(empty($request->pincode_id)){

                Session::flash('flash_message', 'PLease Select a Valid index (PIN)');
                return redirect('dental-fee-create');
                }


             /**
            * Save new record in dental fees table
            */
            $usual_fee = new UsualFee;
            $usual_fee->procedure_id = $request->procedure_id;
            $usual_fee->course_id = $request->course_id;
            $usual_fee->network_id = $request->network_id;
            $usual_fee->pincode_id = $request->pincode_id;
            $usual_fee->fees = $request->fees;
            $usual_fee->dental_fees = $request->dental_fees;
            $usual_fee->save();

             /**
            * Save new record in dental fees table
            */
            // $dental_fee = new DentalFee;
            // $dental_fee->procedure_id = $request->procedure_id;
            // $dental_fee->course_id = $request->course_id;
            // $dental_fee->network_id = $request->network_id;
            // $dental_fee->pincode_id = $request->pincode_id;
            // $dental_fee->dental_fees = $request->dental_fees;
            // $dental_fee->save();

              
                Session::flash('flash_message', ' Fees saved Successfully!');
                return redirect('usual-fee-index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\UsualFee  $usualFee
     * @return \Illuminate\Http\Response
     */
    public function show(UsualFee $usualFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\UsualFee  $usualFee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UsualFee::find($id);


        $procedures = Procedure::pluck('name', 'id');
        $ds_networks = Network::pluck('network_code','id');
         $courses = Course::pluck('course_name','id');
        //dd( $ds_networks);
        $pin = Pincode::pluck('pin_code','id');
          
        return view('usualfee.edit',compact('courses','procedures','ds_networks','pin','data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\UsualFee  $usualFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'procedure_id' => 'required',
            'course_id' => 'required',
            'network_id' => 'required',
            'pincode_id' => 'required',
            'fees' => 'required|numeric',
         
            ]);
               $usual_fee = UsualFee::find($id);
                    $usual_fee->procedure_id = $request->get('procedure_id');
                    $usual_fee->course_id = $request->get('course_id');
                    $usual_fee->network_id = $request->get('network_id');
                    $usual_fee->pincode_id = $request->get('pincode_id');
                    $usual_fee->fees = $request->get('fees');
                    $usual_fee->dental_fees = $request->get('dental_fees');
                $usual_fee->save();
                Session::flash('flash_message', 'Record Updated Successfully!');
                return redirect('usual-fee-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\UsualFee  $usualFee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $usual_fee= UsualFee::find($id);
           $usual_fee->delete();
           Session::flash('flash_message', 'Record deleted Successfully!');
           return redirect('usual-fee-index');
    }

    public function getCourseList(Request $request){



        $courses = DB::table("courses")
                    ->where("procedure_id",$request->procedure_id)
                    ->pluck("course_name","id");
                   
        return response()->json($courses);
    }

    public function getPrefixList(Request $request){
        


        $ds_networks = DB::table("prefix_networks")
          ->where("procedure_id",$request->network_id)
                    
                    ->pluck("pincode_id","id");
                   
        return response()->json($ds_networks);
    }

    public function ajax(){        
        return view('usualfee.autocomplete');
    }
    public function searchResponse(Request $request){


         $query = $request->get('term','');
        $countries=\DB::table('pincodes');
       
            $countries->where('pin_code','LIKE','%'.$query.'%');
      
       
           $countries=$countries->get();        
        $data=array();
        foreach ($countries as $country) {
                $data[]=array('name'=>$country->pin_code);
        }
        if(count($data))
             return $data;
        else
            return ['name'=>''];
    }
}
