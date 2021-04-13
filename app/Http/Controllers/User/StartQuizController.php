<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\StudentQuizResult;

class StartQuizController extends Controller
{
    public function quizList(){
    	$quizzes = Quiz::where('status', '1')->get();
    	return view('user.pages.quiz.view-quiz', compact('quizzes'));
    }

    public function quizStart($id){
    	$quiz = Quiz::find($id);
    	$questions = Question::where('quiz_id', $id)->get();
    	return view('user.pages.quiz.start-quiz', compact('questions', 'quiz'));
    }

    public function store(Request $request){
    	$countQuestion = count($request->question_no); 
        $scoreCount = 0; 
        $user_id = $request->user_id;
        $quiz_id = $request->quiz_id;
    	for($i=0; $i<$countQuestion; $i++){
    		$question_no = $request->question_no[$i];
            $requestAnswer = 'answer'.$question_no;
            $right_answer = $request->$requestAnswer;
            if($right_answer == 1){
                $scoreCount++;
            }
    	}
        $Quiz = Quiz::find($quiz_id);
        $quizTotalMark = $Quiz->total_mark;

        $date = date('Y-m-d');

        $studentQuizResult = new StudentQuizResult();
        $studentQuizResult->user_id = $user_id;
        $studentQuizResult->quiz_id = $quiz_id;
        $studentQuizResult->total_mark = $quizTotalMark;
        $studentQuizResult->result = $scoreCount;
        $studentQuizResult->date = date('Y-m-d', strtotime($date));
        $studentQuizResult->save();

        return redirect()->route('user.complete.quiz.list')->with('success', 'Your Exam Complete Success!!');

    }

    public function completeQuizList(){
        return view('user.pages.quiz.result-view');
    }

}
