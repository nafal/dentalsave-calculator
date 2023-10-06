<?php

namespace DentalCalculator;

use Illuminate\Database\Eloquent\Model;

class UsualFee extends Model {

    protected $table = 'usual_fees';
    protected $fillable = ['procedure_id', 'course_id', 'network_id', 'pincode_id', 'fees'];

    public static function getFees($n, $c, $p, $d = null) {
        $course = UsualFee::where('network_id', '=', $n)
                ->where('course_id', '=', $c)
                ->where('procedure_id', '=', $p)
                ->get();
        $course = $course->toArray();
        if ($d) {
            return !empty($course) ? $course[0]['dental_fees'] : '';
        } else {
            return !empty($course) ? $course[0]['fees'] : "";
        }
//        echo '<pre>';
//        print_r($course);
//        die;
    }
    
    public static function getProcedure($pid){
          return Procedure::find($pid)->name;  
    }
    
      public static function getNetwork($nid){
          return Network::find($nid)->network_code;  
    }
    
      public static function getCourse($cid){
          $c= Course::find($cid);  
          return $c->course_name . '<br>'. $c->code;
    }

}
