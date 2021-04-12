<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

class StartQuizController extends Controller
{
    public function quizList(){
    	$quizzes = Quiz::where('status', '1')->get();
    	return view('user.pages.quiz.view-quiz', compact('quizzes'));
    }
}
