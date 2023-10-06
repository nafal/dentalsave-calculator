<?php

namespace DentalCalculator;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{

	protected $fillable = ['pin_code','network_id'];
    protected $table = 'pincodes';

    public function network()
    {
         return $this->belongsTo('DentalCalculator\Network');
    }
}
