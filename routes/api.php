<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/bot/getupdates', 'Api\BotController@getUpdate');
Route::post('/bot/sendmessage', 'Api\BotController@sendMessage');
Route::post('/1785958129:AAELfvq44owJs4yUnOACw-2czPoqMc3MTKg/webhook', 'Api\BotController@webhook');
Route::get('/1785958129:AAELfvq44owJs4yUnOACw-2czPoqMc3MTKg/webhook', 'Api\BotController@webhook');
