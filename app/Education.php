<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $fillable = [
		'major', 'education_level', 'institution', 'qualification_level', 'graduate_month', 'graduate_year',
	];
}
