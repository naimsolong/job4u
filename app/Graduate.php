<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    protected $fillable = [
    	'degree_type', 'course_name', 'faculty', 'matric_no', 'graduate_month', 'graduate_year',
    ];

   	public function alumni() {
   		return $this->belongsTo('App\Alumni');
   	}
}
