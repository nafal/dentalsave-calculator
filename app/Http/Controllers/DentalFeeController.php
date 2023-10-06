<?php

namespace DentalCalculator\Http\Controllers;
use Illuminate\Support\Facades\Input;
use DentalCalculator\DentalFee;
use Illuminate\Http\Request;
use DentalCalculator\Procedure;
use DentalCalculator\PrefixNetwork;
use DentalCalculator\Network;
use DentalCalculator\Pincode;
use Session;
use Response;

use Illuminate\Support\Facades\DB;

class DentalFeeController extends Controller
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
         $data = DentalFee::orderBy('id', 'desc')->paginate(10);
            return view('dentalfee.index')->with('data',$data);
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
          
        return view('dentalfee.create',compact('procedures','ds_networks','pin'));
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
            //'pincode_id' => 'required',
              'pin' => 'required',
         
            'dental_fees' => 'required|numeric',
            ]);
 
                if(empty($request->pincode_id)){

                Session::flash('flash_message', 'PLease Select a Valid index (PIN)');
                return redirect('dental-fee-create');
                }


            
             $check_network = PrefixNetwork::where('network_id','=', $request->network_id)->first();

            if(empty($check_network)){

                Session::flash('flash_message', 'Network not mapped ');
                return redirect('dental-fee-create');
            }
             
            

            $dental_fee = new DentalFee;
            $dental_fee->procedure_id = $request->procedure_id;
            $dental_fee->course_id = $request->course_id;
            $dental_fee->network_id = $request->network_id;
            $dental_fee->pincode_id = $request->pincode_id;
            $dental_fee->dental_fees = $request->dental_fees;
            $dental_fee->save();

              Session::flash('flash_message', 'Dental Fee saved Successfully!');
            return redirect('dental-fee-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\DentalFee  $dentalFee
     * @return \Illuminate\Http\Response
     */
    public function show(DentalFee $dentalFee)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\DentalFee  $dentalFee
     * @return \Illuminate\Http\Response
     */
    public function edit(DentalFee $dentalFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\DentalFee  $dentalFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DentalFee $dentalFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\DentalFee  $dentalFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(DentalFee $dentalFee)
    {
        //
    }
    public function autocomplete(){

            $term = request('term');
            $result = Pincode::wherePinCode($term)->orWhere('pin_code', 'LIKE', '%' . $term . '%')->get(['id', 'pin_code as value']);
            return response()->json($result);
    }

}
