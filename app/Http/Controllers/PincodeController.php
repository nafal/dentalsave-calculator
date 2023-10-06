<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Pincode;
use DentalCalculator\Network;
use Illuminate\Http\Request;
use Session;

class PincodeController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Pincode::paginate(10);

        return view('pincode.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request);

        $this->validate($request, [
            'pin_code' => 'required|numeric|digits_between:1,5',
            'network_id' => 'required',
        ]);
        $pin = Pincode::create($request->all());
        Session::flash('flash_message', 'Pin code added Successfully!');

        return redirect('pin-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function show(Pincode $pincode) {
        $networks = Network::pluck('network_code', 'id');
        return view('pincode.show', compact('networks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $data1 = Pincode::find($id);
        $networks = Network::pluck('network_code', 'id');
        $data = array('networks' => $networks, 'data' => $data1);
        return view('pincode.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $this->validate($request, [
            'pin_code' => 'required|numeric|digits_between:1,5',
        ]);

        $pin = Pincode::find($id);
        $pin->network_id = $request->get('network_id');
        $pin->pin_code = $request->get('pin_code');

        $pin->save();
        Session::flash('flash_message', 'Record Updated Successfully!');
        return redirect('pin-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pincode $pincode) {
        //
    }

}
