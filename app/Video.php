<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Photo;
use App\Course;

class Video extends Model
{
    protected $fillable = [
    	'title',
    	'link',
        'photo_id',
        'course_id',
    ];

    public function photo() {
    	return $this->belongsTo(Photo::class);
    }
    
    public function course() {
        return $this->belongsTo(Course::class);
    }

}
