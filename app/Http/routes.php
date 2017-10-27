<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::resource('/employees','EmployeesController');

Route::group(['middleware' => 'auth'], function() {
	Route::resource('/employees','EmployeesController');
	Route::get('employees/{id}/delete',['as'=>'employees.delete', 'uses'=>'EmployeesController@delete']);
});

// Route::get('/login','AuthController@getLogin');
Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as'=>'postLogin','uses'=>'Auth\AuthController@postLogin']);

Route::get('auth/logout', ['as' => 'logout','uses' => 'Auth\AuthController@getLogout',
]);

// Route::get('error',['as' => 'error',function() {
// 	return view('errors.404');
// }]);


//Route::controller('/', 'Auth\AuthController');
// Route::get('dashboard', function () {
//     return view('layout');
// });
