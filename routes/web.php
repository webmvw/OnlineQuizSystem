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
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function(){
	Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// setups management
	Route::group(['prefix' => 'question'], function(){
		// department
		Route::get('/question/view', [App\Http\Controllers\Admin\QuestionController::class, 'view'])->name('question.view');
		Route::get('/question/add', [App\Http\Controllers\Admin\QuestionController::class, 'add'])->name('question.add');
		Route::post('/question/store', [App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('question.store');
		Route::get('/question/edit/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'edit'])->name('question.edit');
		Route::post('/question/update/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'update'])->name('question.update');
		Route::get('/question/delete/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'delete'])->name('question.delete');
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
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth']], function(){
	Route::get('/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
});
