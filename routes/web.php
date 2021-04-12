<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['admin', 'auth']], function(){
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// quiz management
	Route::group(['prefix' => 'quiz_manage'], function(){
		// quiz
		Route::get('/quiz/view', [App\Http\Controllers\Admin\QuizController::class, 'view'])->name('quiz.view');
		Route::get('/quiz/details{id}', [App\Http\Controllers\Admin\QuizController::class, 'details'])->name('quiz.details.view');
		Route::get('/quiz/add', [App\Http\Controllers\Admin\QuizController::class, 'add'])->name('quiz.add');
		Route::post('/quiz/store', [App\Http\Controllers\Admin\QuizController::class, 'store'])->name('quiz.store');
		Route::get('/quiz/edit/{id}', [App\Http\Controllers\Admin\QuizController::class, 'edit'])->name('quiz.edit');
		Route::post('/quiz/update/{id}', [App\Http\Controllers\Admin\QuizController::class, 'update'])->name('quiz.update');
		Route::get('/quiz/delete/{id}', [App\Http\Controllers\Admin\QuizController::class, 'delete'])->name('quiz.delete');
		Route::get('/quiz/active/{id}', [App\Http\Controllers\Admin\QuizController::class, 'active'])->name('quiz.active');
		Route::get('/quiz/deactive/{id}', [App\Http\Controllers\Admin\QuizController::class, 'deactive'])->name('quiz.deactive');

		// question
		Route::get('/question/view', [App\Http\Controllers\Admin\QuestionController::class, 'view'])->name('question.view');
		Route::get('/question/add', [App\Http\Controllers\Admin\QuestionController::class, 'add'])->name('question.add');
		Route::post('/question/store', [App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('question.store');
		Route::get('/question/delete/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'delete'])->name('question.delete');
	});	


	// student management
	Route::group(['prefix' => 'student_manage'], function(){
		// for student
		Route::get('/student/view', [App\Http\Controllers\Admin\StudentController::class, 'view'])->name('student.view');
		Route::get('/student/add', [App\Http\Controllers\Admin\StudentController::class, 'add'])->name('student.add');
		Route::post('/student/store', [App\Http\Controllers\Admin\StudentController::class, 'store'])->name('student.store');
		Route::get('/student/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('student.edit');
		Route::post('/student/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('student.update');
		Route::get('/student/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete'])->name('student.delete');
	});

});



/*
|--------------------------------------------------------------------------
|  Routes for user
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
});
