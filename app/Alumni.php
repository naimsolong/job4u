<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
    	'identity_card', 'birth_date', 'birth_state', 'race', 'religion', 'disability', 'marriage_status', 'phone', 'address_1', 'address_2', 'city', 'postal', 'state', 'country', 'about_me', 'profile_view', 'expected_salary'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function works() {
    	return $this->hasMany('App\Work');
    }

    public function educations() {
    	return $this->hasMany('App\Education');
    }

    public function skills() {
    	return $this->hasMany('App\Skill');
    }

    public function languages() {
        return $this->hasMany('App\Language');
    }

    public function graduate() {
        return $this->hasOne('App\Graduate');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }
}
