<?php

namespace DentalCalculator;

use Illuminate\Database\Eloquent\Model;

class PrefixNetwork extends Model
{
    

    protected $table = 'prefix_networks';
    protected $fillable = ['pincode_id','network_id'];


    
}
