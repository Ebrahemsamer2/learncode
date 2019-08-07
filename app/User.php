<?php

namespace App;

use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Photo;
use App\Track;

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


    public static function generateVerificationCode() {
        return Str::random(40);
    }

    public function photo() {
        return $this->hasOne(Photo::class);
    }

    public function tracks() {
        return $this->belongsToMany(Track::class);
    }

}
