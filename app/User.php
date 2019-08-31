<?php

namespace App;

use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Photo;
use App\Track;
use App\Quiz;
use App\Course;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = 1;
    const UNVERIFIED_USER = 0;
    
    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $fillable = [
        'name',
        'email',
        'verified',
        'verification_token',
        'admin',
        'password',
        'photo_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photo() {
        return $this->belongsTo(Photo::class);
    }

    public function tracks() {
        return $this->belongsToMany(Track::class);
    }

    public function quizes() {
        return $this->belongsToMany(Quiz::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }
}
