<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

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
