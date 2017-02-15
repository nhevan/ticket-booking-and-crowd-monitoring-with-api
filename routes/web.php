<?php

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
Route::get('/test-pdf', function () {
    $snappy = App::make('snappy.pdf');
    // dd($snappy);

	$html = '<h1>Bill</h1><p>You owe me money, dude.</p>';
	$snappy->generateFromHtml($html, '/tmp/bill-123.pdf');
	// $snappy->generate('http://www.github.com', '/tmp/github.pdf');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
