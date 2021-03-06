<?php

use App\Ticket;
use App\Mail\SendTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', 'QuestionsController@questionnaire');
Route::get('/questionnaire', 'QuestionsController@questionnaire');
Route::get('/register-visitor', 'TicketsController@registerVisitor');
Route::post('/generate-ticket', 'TicketsController@generateTicket');

Route::get('/resend-ticket/{ticket}', 'TicketsController@resendTicket')->name('ticket.resend');
Route::get('/download-ticket/{ticket}', 'TicketsController@downloadTicket')->name('ticket.download');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/swap-reg-status', 'HomeController@swapRegistrationStatus');
Route::get('/on-spot-registration', 'OnSpotRegistrationController@onSpotRegistration')->name('on-spot-registration');
Route::post('/on-spot-registration', 'OnSpotRegistrationController@generateOnSpotTicket')->name('generate-on-spot');

Route::get('/passport-keys', 'HomeController@passport');

Route::get('/all-ticket-codes', function(){
	return Ticket::all('id', 'reg_id','name','phone','email');
});
