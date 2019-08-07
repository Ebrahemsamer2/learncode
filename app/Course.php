<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Track;
use App\User;
use App\Video;
use App\Photo;

class Course extends Model
{

    const UNPAID = 0;
    const PAID = 1;

    protected $fillable = [
    	'title',
    	'description',
        'paid',
    	'photo_id',
    	'track_id',
    ];

    public function photo() {
        return $this->belongsTo(Photo::class);
    }
    public function track() {
    	return $this->belongsTo(Track::class);
    }

    public function users() {
    	return $this->belongsToMany(User::class);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }
}
