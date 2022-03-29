<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Article;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GamesController;

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ArsenalController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PremierController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\payements\mpesa\MpesaController;


// use App\Http\Controllers\MpesaController;


use Stripe\ApiResource;

//use Database\Seeders\ArticlesTableSeeder;




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
    //Route::resource('games', GamesController::class);

});



Route::get('articles', function () {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    //return Articles::all();
});
Route::resource('api/articles', ArticleController::class);

Route::apiResource('api/comments', CommentController::class);

Route::resource('api/books', BookController::class);


Route::resource('api/students', StudentController::class);
Route::resource('api/games', GamesController::class);
Route::resource('contacts', ContactController::class);
Route::resource('api/arsenal', ArsenalController::class);
Route::resource('api/users', UsersController::class);

Route::resource('api/premier', PremierController::class);

Route::resource('api/posts', PostController::class);






//Route::post('api/register', 'Auth\RegisterController@register');

//Route::resource('contacts', 'App\Http\Controllers\ContactController');
//Route::post('register', [PassportAuthController::class, 'register']);
//πRoute::post('login', [PassportAuthController::class, 'login']);

Route::resource('api/photo', PhotoController::class);

Route::resource('photo', App\Http\Controllers\API\PhotoController::class);

Route::post('api/get-tokens', [MpesaController::class, 'getAcessToken']);


//mpesa token
//Route::post('v1/access/token', 'MpesaController@generateAccessToken');
//Route::post('v1/hlab/stk/push', 'MpesaController@customerMpesaSTKPush');
