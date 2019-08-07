<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'title',
    	'answers',
    	'right_answer',
    	'score',
    	'track_id',
    ];

    public function track() {
    	return $this->belongsTo(Track::class);
    }
}
