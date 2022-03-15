<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Article;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\PhotoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function () {


    //Route::resource('students', StudentController::class);
});



Route::get('articles', function () {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    //return Article::all();
});
Route::resource('students', StudentController::class);
Route::resource('contacts', ContactController::class);
//Route::resource('contacts', 'App\Http\Controllers\ContactController');
 //Route::post('register', [PassportAuthController::class, 'register']);
 //πRoute::post('login', [PassportAuthController::class, 'login']);

 Route::resource('photos', PhotoController::class);

 Route::resource('photo', App\Http\Controllers\API\PhotoController::class);
