<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
	protected $fillable = [
		'identity_card', 'birth_date', 'race', 'religion', 'current_position', 'employer_type', 'phone',
	];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
	public function jobs() {
		return $this->hasMany('App\Job');
	}
    
    public function company() {
    	return $this->hasOne('App\Company');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }

}
