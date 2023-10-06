<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Course;
use DentalCalculator\Network;
use Illuminate\Http\Request;
use DentalCalculator\Procedure;
use DentalCalculator\UsualFee;
use DentalCalculator\Pincode;
use Session;

class CourseController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function bulkdelete() {
//        if (isset($_POST['checkboxes']) && ($_POST['checkboxes'] == 1) && ($model == 'Course')) {
//            $model = $_POST['form_name'];
//            $id = $_POST['item_val'];
//            $ids = explode(",", $id);
//            $courses = $model::whereIn('id', $ids)->get();
//            foreach ($courses as $course) {
//                UsualFee::where('id', $course->id)->delete();
//            }
//            $model::whereIn('id', $ids)->delete();
//        } else if (isset($_POST['checkboxes']) && ($_POST['checkboxes'] == 2)) {
//            
//        }
        Session::flash('flash_message',  ' Deleted successfully..!');
        return redirect('Courseindex');


//        echo '<pre>';
//        print_r($_POST);
//        die('safdsafd');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseIndex() {


        $data = Course::with('Procedure')->paginate(10);

        // dd($data->toArray());

        return view('course.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $proceds = Procedure::all();
        $networks = Network::pluck('network_code', 'id');
        //print_r($networks->toArray());
        // die();
        return view('course.create', compact('proceds', 'networks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {



        $course_id = Course::create($request->all())->id;
        $procedure_id = $request->procedure_id;
//        echo $procedure_id;
//        die;


        $list = $request->hidden;

        foreach ($list as $k => $dat) {
            $usual_fee = new UsualFee;
            $usual_fee->procedure_id = $request->procedure_id;
            $usual_fee->pincode_id = $request->pin;
            $usual_fee->course_id = $course_id;
            $usual_fee->network_id = $dat;
            $usual_fee->fees = $request->fees[$dat];
            $usual_fee->dental_fees = $request->dental_fees[$dat];
            $usual_fee->save();
        }

        Session::flash('flash_message', 'Fees Added Successfully!');
        return redirect('usual-fee-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = Course::find($id);
        $networks = Network::pluck('network_code', 'id');
        return view('course.edit', compact('data', 'id', 'networks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course) {
        //
    }

    public function view($id) {
        $data = Course::find($id);
        $networks = Network::pluck('network_code', 'id');
        return view('course.view', compact('data', 'id', 'networks'));
    }

    public function update1(Request $request, $id) {
        $course_id = Course::create($request->all())->id;
        $procedure_id = $request->procedure_id;
        $list = $request->hidden;
        //  echo '<pre>'; print_r($_POST); die; 
        foreach ($list as $k => $dat) {
            $usual_fee = new UsualFee;
            $usual_fee->procedure_id = $request->procedure_id;
            $usual_fee->pincode_id = $request->pin;
            $usual_fee->course_id = $course_id;
            $usual_fee->network_id = $dat;
            $usual_fee->fees = $request->fees[$dat];
            $usual_fee->dental_fees = $request->dental_fees[$dat];
            $usual_fee->save();
        }
        Session::flash('flash_message', 'Record Updated Successfully!');
        return redirect('Courseindex');
    }

}
