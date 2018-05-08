<?php

Route::get('calculator', function(){
	echo 'Hello from the calculator package!';
});


Route::get('add/{a}/{b}', 'Frontiernxt\LaravelRESTApi\Controllers\LaravelRESTApiController@add');
Route::get('subtract/{a}/{b}', 'Frontiernxt\LaravelRESTApi\Controllers\LaravelRESTApiController@subtract');

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function ($api) {

	$api->get('calculator', 'Frontiernxt\LaravelRESTApi\Http\Controllers\LaravelRESTApiController@show');

	//user resource. Supported methods: index and store
	$api->resource('users', 'Frontiernxt\LaravelRESTApi\Http\Controllers\UserResourceController', ['only' => ['index', 'store']]);


	$api->post('login', 'Frontiernxt\LaravelRESTApi\Http\Controllers\UserAuthController@login');
});