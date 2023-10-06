<?php

namespace DentalCalculator;
 // use App\Course ;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
     protected $table = 'procedures';
     protected $fillable = [
        'name','status'
      ];


    public function Courses()
    {
        return $this->hasMany('DentalCalculator\Course');
    }
}
