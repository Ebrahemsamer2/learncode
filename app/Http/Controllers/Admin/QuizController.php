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
        $quizes = Quiz::paginate(10);
        return view('quizes.index', compact('quizes'));
    }

    public function create()
    {
        return view('quizes.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Quiz $quiz)
    {
        return view('quizes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quizes.edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        Session::flash('deleted_quiz', 'Quiz ' . $quiz->title . ' has deleted');
        return redirect('/admin/quizes');
    }
}
