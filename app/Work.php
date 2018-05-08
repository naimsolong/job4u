<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
    	'position_title', 'position_level', 'job_category', 'company_name', 'start_duration', 'end_duration', 'salary',
    ];
}
