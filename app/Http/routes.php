<?php
use App\Post;
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

Route::get('/', 'HomeController@showWelcome');

Route::get('/uppercase/{word}', 'HomeController@uppercase');

Route::get('/rolldice/{guess}', 'HomeController@rolldice');

Route::get('/increment/{number?}', 'HomeController@increment');

Route::resource('/posts', 'PostsController');

Route::get('orm-test', function ()
{
$post = Post::all();
dd ($post);
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













