<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Course;
use App\Track;
use App\Photo;
use App\Video;
use App\Question;
use App\Quiz;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	// Do not check foreign keys
    	DB::statement('set FOREIGN_KEY_CHECKS = 0');

    	// reset All Tables
        User::truncate();
        Course::truncate();
        Track::truncate();
        Photo::truncate();
        Video::truncate();
        Question::truncate();
        Quiz::truncate();

        DB::table('course_user')->truncate();
        DB::table('track_user')->truncate();

        $usersCount = 50;
        $coursesCount = 20;
        $photosCount = 30;
        $questionsCount = 50;
        $tracksCount = 10;
        $videosCount = 100;
        $quizzesCount = $coursesCount * 4;


        factory(Photo::class, $photosCount)->create();
        factory(User::class, $usersCount)->create();
        factory(Track::class, $tracksCount)->create();
        factory(Course::class, $coursesCount)->create();
        factory(Quiz::class, $quizzesCount)->create();
        factory(Question::class, $questionsCount)->create();
        factory(Video::class, $videosCount)->create();

    }
}
