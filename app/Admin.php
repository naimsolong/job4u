<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $fillable = [
		'identity_card', 'birth_date', 'race', 'religion',
	];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
