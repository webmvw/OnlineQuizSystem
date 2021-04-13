<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Quiz;
use App\Models\Question;
use App\Models\QuestionAnswer;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
    	$allData = Quiz::orderBy('id', 'desc')->get();
    	return view('admin.pages.quiz.view-quiz', compact('allData'));
    }



    /**
     * Dispaly single quiz with question and answer
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id){
        $data['quiz'] = Quiz::find($id);
        $data['questions'] = Question::where('quiz_id', $id)->get();
        return view('admin.pages.quiz.details-quiz', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
    	return view('admin.pages.quiz.add-quiz');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	$quiz = new Quiz();
    	$quiz->name = $request->quiz;
    	$quiz->total_mark = $request->total_mark;
    	$quiz->time = $request->time;
        $quiz->total_question = $request->total_question;
    	$quiz->save();
    	return redirect()->route('quiz.view')->with('success', 'Quiz Added Success');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$quiz = Quiz::find($id);
    	return view('admin.pages.quiz.edit-quiz', compact('quiz'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    	$quiz = Quiz::find($id);
    	$quiz->name = $request->quiz;
    	$quiz->total_mark = $request->total_mark;
    	$quiz->time = $request->time;
        $quiz->total_question = $request->total_question;
    	$quiz->save();
    	return redirect()->route('quiz.view')->with('success', 'Quiz Updated Success');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    	$quiz = Quiz::find($id);
    	$quiz->delete();
    	return redirect()->route('quiz.view')->with('success', 'Quiz Deleted Success');
    }


    /**
     * active quiz and when quiz active then student see quiz list their profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id){
        $quiz = Quiz::find($id);
        $totalQuizQuestion = $quiz->total_question;
        $questionCount = Question::where('quiz_id', $id)->get()->count();
        if($questionCount == $totalQuizQuestion){
            $quiz->status = '1';
            $quiz->save();
            return redirect()->back()->with('success', 'Quiz Actived Success');
        }else{
            return redirect()->back()->with('error', 'Incomplete Question.');
        }
        
    }


    /**
     * deactivate quiz
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactive($id){
        $quiz = Quiz::find($id);
        $quiz->status = '0';
        $quiz->save();
        return redirect()->back()->with('success', 'Quiz Deactived Success');
    }

}
