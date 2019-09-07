<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use App\Question;
use App\Quiz;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(20);
        return view('admin.questions.index', compact('questions'));
    }

    public function addQuestion($id)
    {   
        $quizzes = Quiz::pluck('title', 'id');

        $quiz = Quiz::findOrFail($id);
        return view('admin.questions.create', compact('quiz'));
    }

    public function create() {
        $quizzes = Quiz::pluck('title', 'id');
        return view('admin.questions.create', compact('quizzes'));
    }

    public function store(Request $request)
    {
        
        $rules = [
            'title' => 'required',
            'answers' => 'required|min:10',
            'right_answer' => 'required',
            'score' => 'required|integer',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        
        Question::create($data);
        Session::flash('created_question', 'Question ' . $request->title . ' has Created');
        return redirect('/admin/questions');

    }
    
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));    
    }

    public function edit(Question $question)
    {
        $quizzes = Quiz::pluck('title', 'id');
        return view('admin.questions.edit', compact('question', 'quizzes'));
    }

    public function update(Request $request, Question $question)
    {
        
        $rules = [
            'title' => 'required',
            'answers' => 'required|min:10',
            'right_answer' => 'required',
            'score' => 'required|integer',
            'quiz_id' => 'required|integer',
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

        if($request->has('quiz_id')) {
            $question->quiz_id = $request->quiz_id;
        }

        if($question->isClean()) {
            Session::flash('nothing_changed', 'Nothing Changed');
            return redirect('/admin/questions/'. $question->id .'/edit');
        }else {
            $question->save();
            Session::flash('updated_question', 'Question ' . $request->title . ' has Updated');
            return redirect('/admin/questions');
        }
    }

    public function destroy(Question $question)
    {
        $question->delete();
        Session::flash('udeleted_question', 'Question ' . $question->title . ' has Deleted');
        return redirect('/admin/questions');
    }
}
