<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\User;
use App\Course;
use App\Question;
use App\Track;
use App\Photo;
use App\Video;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Photo::class, function (Faker $faker) {
    return [
        'filename' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg']),
    ];
});


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),

        'verified' => $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'verification_token' => User::generateVerificationCode(),
        'admin' => $faker->randomElement([User::REGULAR_USER, User::ADMIN_USER]),
        'photo_id' => Photo::all()->random()->id,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Track::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'photo_id' => Photo::all()->random()->id,
    ];
});


$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(1),
        'description' => $faker->paragraph(2),
        'photo_id' => Photo::all()->random()->id,
        'track_id' => Track::all()->random()->id,
        'paid' => $faker->randomElement([Course::PAID, Course::UNPAID]),
    ];
});

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(1),
        'link' => $faker->paragraph(1),
        'photo_id' => Photo::all()->random()->id,
        'course_id' => Course::all()->random()->id,
        'track_id' => Track::all()->random()->id,
    ];
});



$factory->define(Question::class, function (Faker $faker) {
    $answers = $faker->paragraph(1);
    $right_answer = explode(' ', $answers)[$faker->randomElement([0,1,2,3])];
    return [
        'title' => $faker->paragraph(1),
        'answers' => $answers,
        'right_answer' => $right_answer,
        'score' => $faker->randomElement([10,15,20]),
        'track_id' => Track::all()->random()->id,
    ];
});



