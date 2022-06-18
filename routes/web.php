<?php

use App\Http\Controllers\JsonToListController;
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
    return view('send_json');
});

Route::get('/send_json_js', function () {
    return view('send_json_js');
});

Route::match(
    ['get', 'post'],
    '/json_to_list',
    [JsonToListController::class, 'decode'],
)->name('jsonToList');
