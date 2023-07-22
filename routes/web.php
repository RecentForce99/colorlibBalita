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

//Route::get('/posts/{category}/', [\App\Http\Controllers\PostsListController::class, 'getView'])->name('contacts.feedback');
//Route::get('/posts/{category}/{code}/', [\App\Http\Controllers\PostsDetailController::class, 'getView'])->name('contacts.feedback');

Route::get('/', [\App\Http\Controllers\IndexController::class, 'getView'])->name('index');

Route::post('/feedback/', [\App\Http\Controllers\FeedbackController::class, 'sendFeedback'])->name('contacts.feedback');
Route::get('/contacts/', function () {
    return view('contacts.index');
});
