<?php // Code within app\Helpers\Helper.php

namespace App\Http\Helper;
use DentalCalculator\Pincode;
use DentalCalculator\Network;
use DentalCalculator\Course;
use DentalCalculator\Procedure;
use DentalCalculator\DentalFee;
class Helpers
{
    public static function getPin($id)
    {
         $data = Pincode::find($id);
        if($data){
        $pin=  $data->pin_code;

        }else{
           $pin= 'N/A';
        }
          return $pin;
        
    }

    public static function getNetwork($id)
    {
        $data = Network::find($id);
         return $data->network_code;
    }

    public static function getCourse($id)
    {
        $data = Course::find($id);
         return $data->course_name;
    }
  
        public static function getCourseId($id)
    {
        $data = Course::find($id);
         return $data->code;
    }
    public static function getProcedure($id)
    {
        $data = Procedure::find($id);
         return $data->name;
    }
     public static function getDentalFee($netwrk_id,$course_id)
    {
        //echo $netwrk_id.'-'.$course_id;die; 
       $data =  DentalFee::where('network_id', $netwrk_id)
          ->where('course_id', $course_id)
           ->first();
           $dental_fee='';
          if(!empty($data)){
           $dental_fee= $data->dental_fees;
          }else{

            $dental_fee = 'not updated';
          }
        
         return $dental_fee;
    }
}