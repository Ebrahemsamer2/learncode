<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    
    protected $fillable = [
    	'title',
    	'course_id',
    ];

	public function course() {
		return $this->belongsTo('App\Course');
	}

	public function questions() {
		return $this->hasMany('App\Question');
	}

}
