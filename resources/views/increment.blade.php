@extends('layouts.master')

@section('content')
	<h1>{{ $number }}</h1>

	<p>
    	<a href="{{ action('HomeController@uppercase', 'word'}}">Uppercase Kings</a>
    </p>
    

@stop