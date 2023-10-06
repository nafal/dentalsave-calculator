<?php

namespace DentalCalculator;

use Illuminate\Database\Eloquent\Model;

class DentalFee extends Model
{


	
    protected $table='dental_fees';
    protected $fillable= ['procedure_id','course_id','network_id','pincode_id','dental_fees'];

}
