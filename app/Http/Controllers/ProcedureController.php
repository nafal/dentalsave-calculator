<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Procedure;
use DentalCalculator\Network;
use DentalCalculator\Course;
use DentalCalculator\UsualFee;
use Illuminate\Http\Request;
use Session;

class ProcedureController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = Procedure::paginate(10);
        return view('procedure.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('procedure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
        ]);
        $user = Procedure::create($request->all());

        Session::flash('flash_message', 'Procedure created successfully!');
        return redirect('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//	    public function update(Request $request, $id)
//
//	    {
//            $course_id = Course::create($request->all())->id;
//            $procedure_id=  $request->procedure_id;;
//            $list = $request->hidden;
//         
//             foreach( $list as $k=> $dat){
//                $usual_fee = new UsualFee;
//                $usual_fee->procedure_id = $request->procedure_id;
//                $usual_fee->pincode_id =  $request->pin;
//                $usual_fee->course_id =  $course_id;
//                $usual_fee->network_id =  $dat;
//                $usual_fee->fees =  $request->fees[$dat];
//                $usual_fee->dental_fees =  $request->dental_fees[$dat];
//                 $usual_fee->save();
//          
//            }
//             Session::flash('flash_message', 'Record Updated Successfully!');
//				return redirect('Courseindex');
//                                
//           
//
//	    }


    public function update(Request $request, $id) {
       
        $proc = Procedure::find($id);
       //  echo '<pre>'; print_r($_POST); die;
        $proc->name = $request->get('name');
        $proc->status = $request->get('status');
        $proc->save();
        Session::flash('flash_message', 'Record Updated Successfully!');
        return redirect('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = Course::find($id);
        //$networks = Network::pluck('network_code','id'); 
        // $ususal = UsualFee::where('network_id', '=', $id)->get();;
        // $ususal  = $ususal->toArray();
        //echo '<pre>'; print_r($ususal); die;
        // $data =  array('data' => $data1, 'networks'=>$networks,'ususal'=>$ususal );
        return view('procedure.edit', compact('data', 'id'));
//                 $proce$ds = Procedure::all(); 
//                  $networks = Network::pluck('network_code','id','proceds','networks'); 
//
//	       $data = Procedure::find($id);
//        	//return view('procedure.edit')->with('data',$procedure);;
//          return view('procedure.edit', compact('data','id','proceds','networks'));
    }

    public function destroy($id) {
        $procedure = Procedure::find($id);
        $procedure->delete();

        Session::flash('flash_message', 'Record deleted Successfully!');
        return redirect('index');
    }

}
