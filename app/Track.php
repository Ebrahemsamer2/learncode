<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Photo;
use App\Question;
use App\Course;
use App\User;

class Track extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'photo_id',
    ];


    // Realtionships
    
    public function photo() {
    	return $this->belongsTo('App\Photo');
    }

    public function courses() {
    	return $this->hasMany(Course::class);
    }

    public function users() {
    	return $this->belongsToMany(User::class);
    }



}
