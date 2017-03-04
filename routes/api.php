<?php

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tickets', 'TicketsCheckerController@fetchAllTickets')->middleware('auth:api');

Route::put('/check-ticket', 'TicketsCheckerController@checkTicket')->middleware('auth:api');

Route::get('/is-app-allowed', 'HomeController@isAppAllowed')->middleware('auth:api');
