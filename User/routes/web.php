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
    return view('welcome1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/welcome','RegisterController@create');
Route::get('/welcome1','HomeController@welcome');
Route::get('/contact','HomeController@contact');
Route::get('/contact','SendEmailController@index');
Route::post('/sendmail/send','SendEmailController@send');
Route::get('/employee','EmployeeController@index');
Route::get('/Editprofile','EmployeeController@edit');
Route::get('/profile','EmployeeController@profile');
Route::post('/Editprofile','EmployeeController@store')->name('addimage');
#Route::get('/employee', function(){
#  $employee = [
#    'name',
#    'email',
#    'resume',
#  ];
#  return view('/employee',[
#    'employees' => $employee,
#  ]);
#});
Route::get('/profile','EmployeeController@open_profile');
Route::get('/employee','HomeController@retrive');
//Route::get('/employee','PostController@insert');
Route::get('/picsuccess','HomeController@pic');
Route::get('/success2','HomeController@suc');
Route::post('/success2','HomeController@store')->name('success2');
Route::get('/search','EmployeeController@search');
//Route::post('/picsuccess','HomeController@destroy');
Route::post('/Editprofile','cover_image@update_avatar')->name('addavatar');
//Route::get('/employee','EmployeeController@get');
Route::get('/jobs','NewjobsController@job');
Route::get('/jobs','NewjobsController@index');
//Route::post('/Editprofile','UserControllerr@create');
//Route::get('/Editprofile','UserControllerr@go');
Route::get('/companies','HomeController@companies');
Route::get('/companies','NewjobsController@com');
Route::get('/searchjobbycom','NewjobsController@searchjobs');
Route::get('/searchviawel','NewjobsController@searchvia');
Route::post('/applypage','ApplyjobController@store');
Route::get('/applypage','NewjobsController@apply');
Route::get('/applypage','NewjobsController@got');
//Route::get('/searchviawel','NewjobsController@check');
Route::get('/appliedjob','HomeController@apply');
Route::get('/appliedjob','NewjobsController@applied');
Route::post('/Editprofile/{id}','HomeController@edit')->name('update');
Route::post('/Editprofile/{id}','HomeController@editpassword')->name('updatepassword');
Route::get('/jobdetails','NewjobsController@jobdetails');
Route::get('/jobdetails/{id}','NewjobsController@iwantjob');
Route::get('/jobdetails','NewjobsController@wantjob');
Route::get('/otherprofile','HomeController@otherpro');
Route::get('/otherprofile/{id}','HomeController@profileother');
Route::post('/newfeeds/{id}','CommentController@comment');
Route::delete('deletecomment/{id}','CommentController@delete');
Route::get('/deletecomment','CommentController@del');
Route::get('/follow/{id}','FollowController@store');
Route::get('/follow','FollowController@follow');
Route::get('/newfeeds','HomeController@feeds');
Route::get('/newfeeds','HomeController@newfeed');
//Route::get('/newfeeds','HomeController@newfeeds');
Route::post('/employee/{id}','CommentController@comment');
Route::get('/network','HomeController@network');
Route::get('/network','HomeController@seefollowers');
Route::delete('/network/{id}','HomeController@deletefriend');
Route::get('/message','HomeController@message');
Route::get('/message/{id}','MessageController@sendmessage');
Route::post('/message/{id}','MessageController@sendingmessage');
Route::get('/message_from_job_provider','MessageController@jp');
Route::get('/message_from_job_provider/{name}','MessageController@mssgfjp');
Route::post('/message_from_job_provider/{name}','MessageController@message_to_provider');
Route::delete('/employee/{id}','PostController@deletepost');
Route::post('/Editprofile/{id}','EmployeeController@editjd');
Route::post('/Editprofile/{id}','EmployeeController@editsc');
Route::post('/Editprofile/{id}','EmployeeController@edithsc');
Route::post('/Editprofile/{id}','EmployeeController@editug');
Route::post('/Editprofile/{id}','EmployeeController@editpg');
Route::get('/whydel','EmployeeController@whydel');
Route::delete('/welcome1/{id}','EmployeeController@delacc');
Route::post('/Editprofile/{id}','EmployeeController@editpd');
Route::get('/searchviawel','NewjobsController@searchjob');
Route::get('/Notification','EmployeeController@notification');
//Route::get('/reportuser/{id}','ReportController@gothere');
Route::get('/reportuser/{id}','ReportController@getuid');
Route::post('/reportuser','ReportController@store');
Route::get('/noti','NotificationController@gothere');
Route::get('/noti','NotificationController@getnotification');
Route::get('/quizdashboard','QuizController@quizdashboard');
Route::get('/web_development_quiz','QuizController@wdq');
Route::get('/mobile_app_development','QuizController@mad');
Route::get('/game_development_quiz','QuizController@gd');
Route::get('/ethical_hacking_quiz','QuizController@ehq');
Route::get('/software_development_quiz','QuizController@sd');
Route::get('/ai_quiz','QuizController@ai');
Route::post('/web_development_quiz','CheckansController@c_ans');
Route::get('/testdone','CheckansController@getmarks');
Route::post('/mobile_app_development','CheckansController@c_ans');
//Route::get('/testdone','CheckansController@gothere');
