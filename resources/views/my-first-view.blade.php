
@extends('layouts.master')

@section('content')
    <h1>Hello, {{ $name }}!</h1>

@if ($name == 'bob')
	<h1>{{$name}}</h1>
@else
	<h1>You must have a name, right?</h1>
@endif

@stop
 