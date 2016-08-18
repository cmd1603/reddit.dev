@extends('layouts.master')

@section ('content')

<form method="POST" action="{{ action('PostsController@store') }}">
{!! csrf_field() !!}

	Title: <input type="text" name="title" value="{{ old('title') }}" >
	{!! $errors->first('title', '<span class="help-block alert alert-warning">:message</span>') !!}

	URL: <input type="text" name="url" value="{{ old('url') }}">
	{!! $errors->first('url', '<span class="help-block alert alert-warning">:message</span>') !!}

	Content: <textarea name="content" rows="5" cols="40">{{ old('content') }}
	</textarea>
	{!! $errors->first('content', '<span class="help-block alert alert-warning">:message</span>') !!}
	
	<input type="submit">

</form>

@stop