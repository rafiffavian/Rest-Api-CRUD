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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/create-product', 'ProductController@createData');
Route::get('/get-product/{id}', 'ProductController@getData');
Route::get('/get-data' , 'ProductController@getAllData');
Route::get('/search-data', 'ProductController@searchData');
Route::patch('/update-data/{id}', 'ProductController@updateData');
Route::delete('/delete-data/{id}', 'ProductController@deleteData');
