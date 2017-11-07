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

	Route::get('publish', function () {
		
		Redis::publish('test-channel',json_encode(['foo' => 'bar']));
	});
	

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

        Route::get('/export',['as'=> 'export','uses' => 'EmployeesController@exportListEmployee']);

        Route::post('/import',['as'=>'import','uses'=>'EmployeesController@importFile']);



	   

});


//test Redis
Route::get('redis',['as' => 'cache',function()
{
    $redis = Redis::connection();

    //STRING
    $redis->set('name', 'Taylor');
    $name = $redis->get('name');

    //  LIST
    //  A list is a series of ordered values. Some of the important commands for interacting with lists are RPUSH, LPUSH, LLEN, LRANGE, LPOP, and RPOP.
    $redis->rpush('friends', 'alice');
    $redis->rpush('friends', 'tom');
    $redis->lpush('friends', 'bob');
    $dosprimeros = $redis->lrange('friends', 0,1);
    $todos = $redis->lrange('friends', 0,-1);
    $cuantos = $redis->llen('friends');
    var_dump($todos);


    //  SET
    //  A set is similar to a list, except it does not have a specific order and each element may only appear once.
    //  Some of the important commands in working with sets are SADD, SREM, SISMEMBER, SMEMBERS and SUNION.
    $redis->sadd('superpowers', array('flight', 'run', 'kill'));
    $values = $redis->smembers('superpowers');
    $existe = $redis->sismember('superpowers','flight'); // => 1
    $noexiste = $redis->sismember('superpowers','love'); // => 0
    var_dump($values);

    //HASH
    $test = array(
        'name' => 'Iván',
        'lastname' => 'Sánchez'
    );
    $redis->hmset('me', $test);
    $me = $redis->hgetall('me');
    var_dump($me);


}]);