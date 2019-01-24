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

 Route::get('/', function() {
        return redirect('login');
 });

Auth::routes();



Route::group(['middleware' => ['auth']], function()
{
	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['middleware' => 'checkRole:admin', 'namespace' => 'Admin'], function () {
		Route::get('admin', 'AdminController@index')->name('admin');
	});


	Route::group(['middleware' => 'checkRole:manager', 'namespace' => 'Manager'], function () {
		Route::get('manager', 'ManagerController@index')->name('manager');
	});


	Route::group(['middleware' => 'checkRole:employee', 'namespace' => 'Employee'], function () {
		 Route::get('employee', 'EmployeeController@index')->name('employee');
	});

});
