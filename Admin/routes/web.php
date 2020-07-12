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
Route::get('/users', 'HomeController@user');
Route::get('/users', 'HomeController@getuser');
Route::get('/job_pro', 'HomeController@job_pro');
Route::get('/companies', 'HomeController@company');
Route::get('/ptjobs', 'HomeController@ptjobs');
Route::get('/ftjobs', 'HomeController@ftjobs');
Route::get('/freelance', 'HomeController@fljobs');
Route::get('/reports/{id}', 'HomeController@reports');
Route::delete('/reports/{ruid}', 'HomeController@del_reports');
Route::delete('/users/{id}', 'HomeController@deleteuser');
Route::delete('/ftjobs/{id}', 'HomeController@deletejob');
Route::get('/searchedusers', 'HomeController@searchuser');
Route::get('/searchjobs', 'HomeController@searchjobs');
Route::get('/searchjobprov', 'HomeController@searchprov');
Route::get('/addquesofquiz', 'HomeController@quiz');
Route::post('/addquesofquiz', 'HomeController@storequiz');
