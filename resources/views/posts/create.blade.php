@extends('layouts.master')

@section ('content')
<h1>Create a New Post</h1>
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="POST" action="{{ action('PostsController@store') }}">
					{!! csrf_field() !!}

			<div class="form-group">
				<div class="row">
					<label for="title" class="col-sm-2 control-label">Title:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="title" value="{{ old('title') }}" >
							@include ('partials.errors', ['field' => 'title'])
						</div>
						<div class="col-sm-6"></div>
				</div>
<br>
				<div class="row">				
				<label for="url" class="col-sm-2 control-label">Url:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="url" value="{{ old('url') }}">
						@include ('partials.errors', ['field' => 'url'])
					</div>
					<div class="col-sm-6"></div>
				</div>
<br>
				<div class="row">
				<label for="url" class="col-sm-2 control-label">Description:</label>
					<div class="col-sm-4">
						<textarea name="content" class="form-control" rows="5" cols="20">{{ old('content') }}</textarea>
						@include ('partials.errors', ['field' => 'content'])
					</div>
					<div class="col-sm-6"></div>
				</div>

			</div>					
			<div class="col-md-12 text-center">
				<input type="submit">
			</div>
		</form>					


	</div>
	<br>

</div>	
@stop