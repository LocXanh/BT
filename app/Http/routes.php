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


Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);

Route::post('auth/login', ['as'=>'postLogin','uses'=>'Auth\AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function() {

	
	
	

	Route::get('auth/logout', ['as' => 'logout','uses' => 'Auth\AuthController@getLogout']);

	Route::resource('employees','EmployeesController');

		Route::get('confirm-register',['as' => 'employees.confirm-register', function(){

		return view('employee.confirm-register');
		}]);

		Route::get('confirm-update/{id}',['as' =>'employees.confirm-update', 'uses' => function($id){

	    	return view('employee.confirm-update',compact('id',$id));
	    }]);

		Route::get('confirm-delete/{id}',['as' =>'employees.confirm-delete', 'uses' => function($id){

	    	return view('employee.confirm-delete',compact('id',$id));
	    }]);

		Route::match(['PUT','PATCH'],'save/{id}',['as'=> 'employees.save', 'uses' => 'EmployeesController@save']);

		Route::post('register',['as'=> 'employees.register', 'uses' => 'EmployeesController@register']);

		Route::get('{id}/delete',['as'=>'employees.delete', 'uses'=>'EmployeesController@delete']);
	    
	    Route::get('notification',['as' =>'notification', 'uses' => function(){

	    	return view('notification');
	    }]);



	   

});

// Route::get('/login','AuthController@getLogin');

// Route::get('error',['as' => 'error',function() {
// 	return view('errors.404');
// }]);


//Route::controller('/', 'Auth\AuthController');
// Route::get('dashboard', function () {
//     return view('layout');
// });
