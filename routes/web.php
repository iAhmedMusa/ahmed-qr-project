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

Route::get('/', function () {
    return 'Hey Bro';
});
Route::get('qr-code','GenerateQrCodeController@index');
Route::get('live','GenerateQrCodeController@livecheck');
Route::get('code','GenerateQrCodeController@code');
Route::get('liveview','GenerateQrCodeController@liveview');
Route::get('robin','GenerateQrCodeController@robin');
Route::get('simple-qr-code','GenerateQrCodeController@simpleQrCode');
Route::get('color-qr-code','GenerateQrCodeController@colorQrCode');
Route::get('image-qr-code','GenerateQrCodeController@imageQrCode');
Route::get('mail','GenerateQrCodeController@ahmed');
Route::get('con','GenerateQrCodeController@imageConvertion');

Route::get('test', 'test@index');

Route::get('echo', 'App\Http\Controllers\bangla@index');

Route::get('robin2/{code}','GenerateQrCodeController@robin2');
Route::get('result', 'GenerateQrCodeController@result');
