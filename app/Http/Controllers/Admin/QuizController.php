<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use App\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->paginate(10);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        Session::flash('deleted_quiz', 'Quiz ' . $quiz->title . ' has deleted');
        return redirect('/admin/quizzes');
    }
}
