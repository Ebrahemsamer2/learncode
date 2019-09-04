<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Photo;
use App\Course;

class Video extends Model
{

    use SoftDeletes;

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
