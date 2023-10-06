<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\PrefixNetwork;
use DentalCalculator\Pincode;
use DentalCalculator\Network;
use Illuminate\Http\Request;
use Session;

class PrefixNetworkController extends Controller
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
       
        $data= PrefixNetwork::paginate(10);
 
        
         return view('prefixnetwork.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

            $pincodes = Pincode::all(); 
            $networks = Network::all(); 
      return view('prefixnetwork.create', compact('pincodes','networks'));
           
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
                'pincode_id' => 'required|numeric|unique:prefix_networks',
                'network_id' => 'required|numeric',
                ]);
         
                 $pin = PrefixNetwork::create($request->all());
                Session::flash('flash_message', 'Mapping saved Successfully!');
               
                return redirect('prefix-network-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DentalCalculator\PrefixNetwork  $prefixNetwork
     * @return \Illuminate\Http\Response
     */
    public function show(PrefixNetwork $prefixNetwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DentalCalculator\PrefixNetwork  $prefixNetwork
     * @return \Illuminate\Http\Response
     */
    public function edit(PrefixNetwork $prefixNetwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DentalCalculator\PrefixNetwork  $prefixNetwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrefixNetwork $prefixNetwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DentalCalculator\PrefixNetwork  $prefixNetwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrefixNetwork $prefixNetwork)
    {
        //
    }
}
