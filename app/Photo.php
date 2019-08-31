<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'filename'
    ];
	
    // ------ Inverse Relationships are not neccessary ----------

    // public function user() {
    // 	return $this->belongsTo('App\User');
    // }

    // public function track() {
    // 	return $this->belongsTo('App\Track');
    // }

    // public function course() {
    // 	return $this->belongsTo('App\Course');
    // }
    
}
