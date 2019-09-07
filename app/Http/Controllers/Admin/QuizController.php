<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Quiz;
use App\Course;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::withTrashed()->orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view('admin.quizzes.index', compact('quizzes', 'courses'));
    }

    public function addQuiz($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.quizzes.create', compact('course'));
    }

    public function store(Request $request)
    {
        
        $rules = [
            'title' => 'required|min:10',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $data = [
            'title' => $request->title,
            'course_id' => $request->course_id,
        ];

        Quiz::create($data);
        Session::flash('created_quiz', 'Quiz ' . $request->title . ' has created');
        return redirect('/admin/quizzes');
    }

    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {   
        $courses = Course::pluck('title', 'id');
        return view('admin.quizzes.edit', compact('quiz', 'courses'));
    }

    public function update(Request $request, Quiz $quiz)
    {

        $rules = [
            'title' => 'required|min:10',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $data = [
            'title' => $request->title,
            'course_id' => $request->course_id,
        ];

        if($request->has('title')) {
            $quiz->title = $request->title;
        }

        if($request->has('course_id')) {
            $quiz->course_id = $request->course_id;
        }
        
        if($quiz->isClean()) {
            Session::flash('nothing_changed', 'Nothing Changed');
            return redirect('/admin/quizzes/ ' . $quiz->id . '/edit');
        }else {
            $quiz->save();
            Session::flash('updated_quiz', 'Quiz ' . $quiz->title . ' has Updated');
            return redirect('/admin/quizzes');
        }
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        Session::flash('deleted_quiz', 'Quiz ' . $quiz->title . ' has deleted');
        return redirect('/admin/quizzes');
    }
}
