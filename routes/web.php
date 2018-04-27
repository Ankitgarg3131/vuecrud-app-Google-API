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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/upload','UsersController@fileUpload');
Route::get('/user/applicant','UsersController@showApplicant');
Route::get('/user/showapplicant','UsersController@showapplicant1');
Route::get('/user/image','UsersController@showimage');
Route::get('/user/allimage','UsersController@showimages1');
Route::get('/user/map','UsersController@showmap');
//Route::get('/user/showmap','UsersController@findLocation');
Route::get('/maps', function(){
    return view('mapscenter');
});
Route::get('/showdatabase', function(){
    return view('MapDatbase');
});

Route::post('/showDataMap', 'MapController@showDataMap');

Route::resource('/user', 'UsersController');