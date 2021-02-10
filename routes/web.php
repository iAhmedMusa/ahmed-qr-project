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

// Route::get('/', function () {
//     return 'Hey Bro';
// });
Route::get('/','GenerateQrCodeController@index');
Route::get('live','GenerateQrCodeController@livecheck');
Route::get('excel','GenerateQrCodeController@excel');
Route::get('liveview','GenerateQrCodeController@liveview');
Route::get('robin','GenerateQrCodeController@robin');
Route::get('kaka','GenerateQrCodeController@kaka');
Route::get('simple-qr-code','GenerateQrCodeController@simpleQrCode');
Route::get('color-qr-code','GenerateQrCodeController@colorQrCode');
Route::get('image-qr-code','GenerateQrCodeController@imageQrCode');
Route::get('mail','GenerateQrCodeController@ahmed');
Route::get('con','GenerateQrCodeController@imageConvertion');
Route::get('url-qr','GenerateQrCodeController@SimpleUrlQRData');

Route::get('filename','GenerateQrCodeController@getFilename');

Route::get('test', 'test@index');

Route::get('echo', 'App\Http\Controllers\bangla@index');

Route::get('robin2/{code}','GenerateQrCodeController@robin2')->where('code', '[0-9]+');
Route::get('result', 'GenerateQrCodeController@result');
Route::get('dir', 'GenerateQrCodeController@dir');

Route::get('ahmed', function () {
    return view('ahmed');
});

Route::get('kisu/{name}', function ($name) {
        return "Hello: $name";
});

Route::get('query', 'GenerateQrCodeController@query');