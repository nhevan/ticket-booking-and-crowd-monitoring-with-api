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

	$data['gate'] = 420;
	$data['slogan'] = 'Amar Shahosh';
	$data['reg_id'] = 'YB-20201';
	$data['name'] = 'NH Shakil';
	$data['phone'] = '01912077825';
	$data['email'] = 'shakil@gmail.com';

	$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
	$barcode = $generator->getBarcode('Hello', $generator::TYPE_CODE_128, 3, 170);

	$data['barcode'] = base64_encode($barcode);
	// exit();

	$pdf = App::make('snappy.pdf.wrapper');
	$pdf->loadView('pdf.ticket', compact('data'));
	$pdf->setPaper('a4')->setOption('margin-bottom', '0mm');
	return $pdf->inline();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
