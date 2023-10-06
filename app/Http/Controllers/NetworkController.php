<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Network;
use Illuminate\Http\Request;
use DentalCalculator\Pincode;
use DentalCalculator\UsualFee;
;

use Session;

class NetworkController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Network::paginate(10);
        return view('network.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $pincode = Pincode::all();

        return view('network.create', compact('pincode'));
    }

//    public function s(Request $request)
//    {
//         $network = new Network;
//         $network->network_code = $request->csv[k][1];
//         $network->save();
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'network_code' => 'required|unique:networks',
        ]);
        $network = Network::create($request->all());
        Session::flash('flash_message', 'Dental Ds network added Successfully!');
        return redirect('network-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function show(Network $network) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = Network::find($id);
        return view('network.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'network_code' => 'required|unique:networks',
        ]);
        $ds_network = Network::find($id);
        $ds_network->network_code = $request->get('network_code');
        $ds_network->save();
        Session::flash('flash_message', 'Record Updated Successfully!');
        return redirect('network-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $network = Network::find($id);
        Pincode::where('network_id', '=', $id)->delete();
        UsualFee::where('network_id', '=', $id)->delete();
        $network->delete();
        Session::flash('flash_message', 'Record(s) deleted Successfully!');
        return redirect('network-index');
    }

}
