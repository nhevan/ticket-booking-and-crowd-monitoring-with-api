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

Route::get('/test-pdf', 'TicketsController@generateTicket');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test-api', function(){
	return Ticket::all('id', 'reg_id');
});
