<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(20);
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        
        $rules = [
            'title' => 'required',
            'answers' => 'required|min:10',
            'right_answer' => 'required',
            'score' => 'required|integer',
            'track_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        Question::create($data);
        return redirect('/admin/questions');

    }
    
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));    
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        
        $rules = [
            'title' => 'required',
            'answers' => 'required|min:10',
            'right_answer' => 'required',
            'score' => 'required|integer',
            'track_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($request->has('title')) {
            $question->title = $request->title;
        }

        if($request->has('answers')) {
            $question->answers = $request->answers;
        }

        if($request->has('right_answer')) {
            $question->right_answer = $request->right_answer;
        }

        if($request->has('score')) {
            $question->score = $request->score;
        }

        if($request->has('track_id')) {
            $question->track_id = $request->track_id;
        }

        if($question->isClean()) {
            // nothing changed
        }else {
            $question->save();
            return redirect('/admin/questions');
        }
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/admin/questions');
    }
}
