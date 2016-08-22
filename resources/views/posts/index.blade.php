@extends('layouts.master')

@section('content')
<table class="table table-bordered table-hover">
	<tr>
		<th><h3>Title</h3></th>
		<th><h3>Url</h3></th>
		<th><h3>Description</h3></th>
		<th><h3>Created by:</h3></th>
	</tr>
	@foreach($posts as $post)
		<tr>
			<td>{{ $post->title }} - {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
			<td><a href="{{ $post->url }}">{{ $post->url }}</a></td>
			<td>{{ $post->content }}</td>
			<td>{{ $post->created_by }}</td>
			<td>
				<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
					{{ method_field('DELETE') }}
					{!! csrf_field() !!}
				 <button type="submit">DELETE</button>				
				</form>
			</td>
			<td><a href="{{ action('PostsController@edit', $post->id) }}">Edit</a></td>
		</tr>
	@endforeach
</table>
	{!! $posts->render() !!}
@stop	