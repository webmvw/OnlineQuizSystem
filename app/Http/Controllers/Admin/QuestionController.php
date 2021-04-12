<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
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
        $quizzes = Quiz::orderBy('id', 'desc')->get();
    	return view('admin.pages.question.add-question', compact('quizzes',));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    		
        // add question no
        $getQuestion = Question::select('question_no')->where('quiz_id', $request->quiz)->get()->count();
        $quiz = Quiz::find($request->quiz);
        $totalQuestionOfQuiz = $quiz->total_question;

        // check question number of total quiz question number
        if($getQuestion < $totalQuestionOfQuiz){
            if($getQuestion == 0){
                $question_no = 1;
            }else{
                $question_no = $getQuestion+1;
            }

    		$question = $request->question;
    		$answers = array();
    		$answers[1] = $request->choice_one;
    		$answers[2] = $request->choice_two;
    		$answers[3] = $request->choice_three;
    		$answers[4] = $request->choice_four;
    		$currect_answer_no = $request->currect_answer_no;

    		//store data in questions table
    		$table_question = new Question;
            $table_question->quiz_id = $request->quiz;
    		$table_question->question_no = $question_no;
    		$table_question->question = $question;
    		$table_question->save();

    		foreach($answers as $key=>$answer){
    			$right_answer = 0;
    			if($key == $currect_answer_no){
    				$right_answer = 1;
    			}
    			$question_answer = new QuestionAnswer;
                $question_answer->quiz_id = $request->quiz;
    			$question_answer->question_no = $question_no;
    			$question_answer->right_answer = $right_answer;
    			$question_answer->answer = $answers[$key];
    			$question_answer->save();
    		}
            return redirect()->route('question.view')->with('success', 'Question Added Success');
		}else{
            return redirect()->back()->with('warning', 'Maximum number of total question!!');
        }
    	
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        DB::transaction(function() use($id){
            $question = Question::find($id);
            $question->delete();

            $quiz_id = $question->quiz_id;
            $question_no = $question->question_no;
            $question_answer = QuestionAnswer::where('quiz_id', $quiz_id)->where('question_no', $question_no)->delete();
        });
        return redirect()->route('question.view')->with('success', 'Question Deleted Success');
    }


}
