@extends('layouts.master')

@section('content')
    <h1>Word: {{ $word }}!</h1>
    <h1>Word: {{ $wordUpper }}!</h1>

    <p>
    	<a href="{{ action('HomeController@increment', ['number' => 5]) }}">Increase Number</a>
    </p>
    
@stop