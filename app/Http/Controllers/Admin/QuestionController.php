<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionAnswer;
use DB;

class QuestionController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
    	$allData = Question::all();
    	return view('admin.pages.question.view-question', compact('allData'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
    	$getQuestion = Question::select('question_no')->get()->count();
    	if($getQuestion == 0){
    		$question_no = 1;
    	}else{
    		$question_no = $getQuestion+1;
    	}
    	return view('admin.pages.question.add-question', compact('question_no'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	DB::transaction(function() use($request){
    		$question_no = $request->question_no;
    		$question = $request->question;
    		$answers = array();
    		$answers[1] = $request->choice_one;
    		$answers[2] = $request->choice_two;
    		$answers[3] = $request->choice_three;
    		$answers[4] = $request->choice_four;
    		$currect_answer_no = $request->currect_answer_no;

    		//store data in questions table
    		$table_question = new Question;
    		$table_question->question_no = $question_no;
    		$table_question->question = $question;
    		$table_question->save();

    		foreach($answers as $key=>$answer){
    			$right_answer = 0;
    			if($key == $currect_answer_no){
    				$right_answer = 1;
    			}
    			$question_answer = new QuestionAnswer;
    			$question_answer->question_no = $question_no;
    			$question_answer->right_answer = $right_answer;
    			$question_answer->answer = $answers[$key];
    			$question_answer->save();
    		}
    		
    	});
    	return redirect()->route('question.view')->with('success', 'Question Added Success');
    }

}
