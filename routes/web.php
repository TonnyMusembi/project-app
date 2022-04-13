<?php

use App\Http\Controllers\BulkSmsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
//use App\Http\Controllers\BulkSmsController;
use App\Http\Controllers\MailController;



use App\Http\Controllers\NotificationController;
use App\Http\Controllers\payements\mpesa\MpesaController;

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

Route::get('send-sms-notification', [NotificationController::class, 'SendSmsNotification']);
Route::resource('students', StudentController::class);
Route::resource('contacts', 'App\Http\Controllers\ContactController');
Route::resource('contacts', ContactController::class);


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send', '\App\Http\Controllers\HomeController@send')->name('home.send');


//Route::post('/get-token',[\App\Http\Controllers\payements\mpesa\MpesaController::class,'getAccessToken']);
Route::post('/get-token', [MpesaController::class, 'getAcessToken']);

Route::view('/bulksms', 'bulksms');
//Route::post('/bulksms', 'BulkSmsController@sendSms');
Route::post('/bulksms', [BulkSmsController::class, 'sendSms']);

Route::get('/send-email', [MailController::class, 'sendEmail']);
