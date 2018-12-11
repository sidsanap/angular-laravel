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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", "FilesController@files");

Route::post("upload/file", "FilesController@upload");

Route::get('/file/list', 'FilesController@listFiles');

Route::post("/delete/file", 'FilesController@delete');

Route::get("/info", "infoController@index");

Route::get('/info/show', 'infoController@show');

Route::get('/info/edit', 'infoController@edit');

Route::post('/info/store', 'infoController@store');

Route::post("/delete/info", 'infoController@delete');



