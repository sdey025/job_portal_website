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
Route::get('/newjob', 'NewjobsController@index');
Route::get('/success', 'HomeController@success');
Route::post('/success', 'NewjobsController@store');
Route::get('/welcome', 'HomeController@welcome');
Route::get('/uplogo', 'HomeController@uplog');
Route::get('/postedjobs', 'NewjobsController@postedjobs');
Route::get('/postedjobs', 'NewjobsController@show');
Route::post('/searchpage1', 'SearchController@search');
//Route::get('/searchpage1', 'SearchController@com');
Route::get('/searchpage1', 'HomeController@search');
//Route::post('/success', 'HomeController@upload');
Route::get('/candidates', 'SearchController@can');
Route::get('/profile', 'SearchController@pro');
Route::get('/candidates_who_applied', 'SearchController@get');
Route::post('/candidates_who_applied', 'SearchController@candidate');
Route::post('/candidates', 'SearchController@got');
//Route::post('/profile/{id}/', 'SearchController@profile');
Route::delete('deletejob/{id}','SearchController@deletejob');
Route::get('/profile/{id}','SearchController@viewprofile');
Route::post('/profile','SearchController@viewpost');
Route::get('/employer','HomeController@emp');
Route::get('/products','HomeController@products');
Route::get('/message','HomeController@message');
Route::get('/message/{id}','TTJS_Controller@message');
Route::post('/message/{name}','TTJS_Controller@sendmessage');
