<?php

namespace DentalCalculator\Http\Controllers;
use DentalCalculator\UsualFee;
use DentalCalculator\Procedure;
use DentalCalculator\PrefixNetwork;
use DentalCalculator\Network;
use DentalCalculator\Pincode;
use DentalCalculator\DentalFee;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __construct(){

      $this->middleware('auth');
    }

    public function index()
    {
	$data = UsualFee::paginate(10);
	return view('usualfee.index')->with('data',$data);

    }


    public function create()
    {
      
          $procedures = Procedure::pluck('name', 'id');
          $ds_networks = Network::pluck('network_code','id');
          $pin = Pincode::pluck('pin_code','id');
          
        return view('dashboard.create',compact('procedures','ds_networks','pin'));
    }

    public function store(Request $request)
    {

    	$this->validate($request, [
            'procedure_id' => 'required',
            'course_id' => 'required',
            'pin' => 'required',
            // 'pin' => 'required|min:3|max:6',
           
            ]);
    	//dd($request);
    	 $index = substr($request->pin, -3);
         $usual_fee= $this->getUsualfee($index,$request);
        // $dental_fee= $this->getDentalfee($index,$request);
         $dental_fee='';
    	

    	
               return view('dashboard.display_fees',compact('usual_fee','dental_fee'));
    }


			public function getUsualfee($index,$request){
				

				$count_pin = Pincode::where('pin_code', $index)
               ->orderBy('id', 'asc')
               
               ->first();
        if($count_pin){

                       $pin_id=$count_pin->id;

                      $check_for_network =   PrefixNetwork::where('pincode_id',$pin_id)
                      ->first();
              if($check_for_network){

                            $network_id=   $check_for_network->network_id;

                          //   $network =   Network::where('id',$network_id)
                          //   ->first();
                          // if($network){

                               // $network_code = $network->network_code;

                                $get_fees =  UsualFee::where('procedure_id',$request->procedure_id)
                                ->where('course_id',$request->course_id)
                                ->where('network_id',$network_id)
                                ->where('pincode_id',$pin_id)
                                ->first();

                                if($get_fees){

                                      $usual_fee =  $get_fees->fees;

                                }else{

                                      $usual_fee="Fees not Updated";
                                }		

                           // }

                      }else{

                          $usual_fee ='Dental Ds Network -Pin Not Mapping';
                      }
               }else{

                     $usual_fee ='Pin code not present';
               }
               return $usual_fee;
        }

        public function getDentalFee($index,$request){



        	$count_pin = Pincode::where('pin_code', $index)
               ->orderBy('id', 'asc')
               
               ->first();
               if($count_pin){

                $pin_id=$count_pin->id;

              $check_for_network =   PrefixNetwork::where('pincode_id',$pin_id)
                 ->first();
                 if($check_for_network){

                 	$network_id=   $check_for_network->network_id;

                 	//$network =   Network::where('id',$network_id)
                // ->first();
              //   if($network){

                // $network_code = $network->network_code;

               $get_fees =  DentalFee::where('procedure_id',$request->procedure_id)
                 			->where('course_id',$request->course_id)
                 			->where('network_id',$network_id)
                 			->where('pincode_id',$pin_id)
                 			->first();
                 
                 	if($get_fees){

                 		   $dental_fee =  $get_fees->dental_fees;

                 	   }else{

                 	    	$dental_fee="fees not Updated";
                 	   }		
            // 		}

                 }else{
                   $dental_fee='Dental Ds Network -Pin Not Mapping';
                 }
               }else{
                    $dental_fee='Pin code not present';
               }
               return $dental_fee;

        }
}
