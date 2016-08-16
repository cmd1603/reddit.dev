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

Route::get('/sayhello/{name}/{name2}', function ($name, $name2) {
	return "Hello $name and $name2";
});

Route::get('/sayhello/{name}', function($name)
{
	if ($name == "Chris") {
		return redirect('/');
	}

	$data = array('name' => $name);
    return view('my-first-view', $data);
});

Route::get('/rolldice/{guess}', function ($guess) {
	$roll = mt_rand(1,6);
	return view ('roll-dice')
		->with("roll",  $roll)
		->with("guess",  $guess)
	;
});