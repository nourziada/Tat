<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestt extends Model
{
	protected $table = 'requests';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
