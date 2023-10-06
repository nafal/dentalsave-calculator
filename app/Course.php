<?php

namespace DentalCalculator;

//use App\Procedure;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $table = 'courses';
    protected $fillable = [
        'procedure_id', 'code', 'course_name'
    ];

    public function Procedure() {
        return $this->belongsTo('DentalCalculator\Procedure');
    }

   

}
