<?php

use App\Http\Controllers\AnswerFormController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PaintersController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('books',BooksController::class);
    Route::resource('painters',PaintersController::class);
    Route::resource('documents',DocumentsController::class);

    
    Route::get('forms/{form}/responser', [AnswerFormController::class,'response'])->name('forms.responser');
    Route::post('forms/{form}/responser/store', [AnswerFormController::class,'store'])->name('forms.responser.store');
    
    Route::resource('forms',FormController::class);
});
  