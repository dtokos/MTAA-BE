<?php

use Illuminate\Support\Facades\Route;

Route::group([
	'prefix' => 'categories'
], function() {
	Route::get('/', 'CategoryController@index');
});



Route::group([
	'prefix' => 'users'
], function() {
	Route::put('{user}', 'UserController@update');
});



Route::group([
	'prefix' => 'courses'
], function() {
	Route::get('/', 'CourseController@index');




	Route::group([
		'prefix' => '{course}/posts',
	], function() {
		Route::get('/', 'PostController@index');
		Route::post('/', 'PostController@store');
		Route::put('{post:id}', 'PostController@update');
		Route::delete('{post:id}', 'PostController@destroy');


		Route::group([
			'prefix' => '{post:id}/comments',
		], function() {
			Route::get('/', 'CommentController@index');
			Route::post('/', 'CommentController@store');
			Route::put('{comment:id}', 'CommentController@update');
			Route::delete('{comment:id}', 'CommentController@destroy');
		});
	});
});
