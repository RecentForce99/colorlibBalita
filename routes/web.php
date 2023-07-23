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
Route::get('/', [\App\Http\Controllers\IndexController::class, 'getView']);

Route::get('/posts/{categoryCode}/', [\App\Http\Controllers\PostsListController::class, 'getView']);
Route::get('/posts/{categoryCode}/{postCode}/', [\App\Http\Controllers\PostsDetailController::class, 'getView'])->name('contacts.feedback');

Route::get('/contacts/', [\App\Http\Controllers\ContactsController::class, 'getView']);
Route::post('/contacts/feedback/', [\App\Http\Controllers\ContactsController::class, 'sendMail']);

//Must be closed by admin role, but we don't have it
Route::get('/parse/posts/', [\App\Http\Controllers\PostsParserController::class, 'getView']);
Route::post('/parse/posts/', [\App\Http\Controllers\PostsParserController::class, 'parseXml']);
