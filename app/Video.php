<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Photo;
use App\Track;
use App\Course;

class Video extends Model
{
    protected $fillable = [
    	'title',
    	'link',
        'photo_id',
        'course_id',
        'track_id',
    ];

    public function photo() {
    	return $this->hasOne(Photo::class);
    }
    
    public function course() {
        return $this->belongsTo(Course::class);
    } 


    // Optinal
    public function track() {
        return $this->belongsTo(Track::class);
    }    

}
