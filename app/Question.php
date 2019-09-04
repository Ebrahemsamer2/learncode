<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{   
    use SoftDeletes;

    protected $fillable = [
    	'title',
    	'answers',
    	'right_answer',
    	'score',
    	'quiz_id',
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
