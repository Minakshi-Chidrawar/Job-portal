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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// job
Route::get('/', 'JobController@index');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'JobController@create')->name('job.create');
Route::post('/jobs/create', 'JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit', 'JobController@update')->name('job.update');
Route::get('/jobs/my-job', 'JobController@myJob')->name('my.job');

Route::get('/jobs/applications', 'JobController@applicant')->name('applicant');

//company
Route::get('company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/create', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@logo')->name('cover.logo');

// User profile
Route::get('user/profile', 'UserController@index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserController@resume')->name('resume');
Route::post('user/avatar', 'UserController@avatar')->name('avatar');

//employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');

Route::post('/applications/{id}', 'JobController@apply')->name('apply');