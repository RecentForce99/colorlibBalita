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

Route::get('/contacts/', [\App\Http\Controllers\FeedbackController::class, 'getView'])->name('contacts');
Route::post('/contacts/', [\App\Http\Controllers\FeedbackController::class, 'sendFeedback'])->name('contacts.feedback');
