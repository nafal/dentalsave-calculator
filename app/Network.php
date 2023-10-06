<?php

namespace DentalCalculator;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
   protected $fillable = ['id','network_code'];
    protected $table = 'networks';


     public function pincodes()
    {
        return $this->hasMany('DentalCalculator\Pincode');
    }
    
    public static function getNetworkss(){
        $nets =  array();
        //$nets = '';
        for($i = '0.75'; $i <= '1.30'; $i+='0.05'){
            $var = 'DS '.$i;
			if($var == 'DS 0.8')
				$var = 'DS 0.80';
			if($var == 'DS 0.9')
				$var = 'DS 0.90';
			if($var == 'DS 1')
				$var = 'DS 1.00';
			if($var == 'DS 1.1')
				$var = 'DS 1.10';
			if($var == 'DS 1.2')
				$var = 'DS 1.20';
			if($var == 'DS 1.3')
				$var = 'DS 1.30';
            $nets[$var] = Network::where('network_code', $var)
                    
               ->get();
           
            
        
        }
       //return $nets->toArray();
        return $nets;
        
        
    }
   
   
    
   
}

