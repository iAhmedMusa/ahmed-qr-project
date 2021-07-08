<?php

use Illuminate\Support\Facades\Route;


Route::get('/','CsvToQr@index');
Route::post('excelUpload', 'CsvToQr@csvImport');
Route::get('makeqr/{name}', 'CsvToQr@makeqr');
Route::get('exr', 'CsvToQr@fileName');
Route::get('downloadZip/{name}', 'CsvToQr@downloadZipFile');
Route::get('download', 'CsvToQr@downloadZip');
Route::get('makeDir', 'CsvToQr@makeDir');


// Route::get('/', function () {
//     return 'Hey Bro';
// });
// Route::get('/','GenerateQrCodeController@index');
Route::get('live','GenerateQrCodeController@livecheck');
Route::get('csv-gen','GenerateQrCodeController@excel');
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
Route::get('makeFolder/{name}', 'GenerateQrCodeController@makeFolder');
Route::get('deleteFolder/{name}', 'GenerateQrCodeController@deleteFolder');

Route::get('ahmed', function () {
    return view('ahmed');
});

Route::get('kisu/{name}', function ($name) {
        return "Hello: $name";
});

Route::get('read', 'GenerateQrCodeController@readFile');
Route::get('emni', 'GenerateQrCodeController@emni');

Route::get('query', 'GenerateQrCodeController@query');
Route::get('excel', 'GenerateQrCodeController@test_page');


// Route::get('excel-to-qr', 'GenerateQrCodeController@makeCsvToQr');
// Route::post('/excelUpload', 'GenerateQrCodeController@csvImport');

Route::get('fetch', 'Practice@index');
Route::get('fetchapi', 'Practice@fetch');
Route::post('fetchapi', 'Practice@store');