@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-10">
			<h1>Title</h1>
				{{ $post->title }}
			<h1>URL</h1>
				<a href="{{ $post->url }}">{{ $post->url }}</a>
			<h1>Description</h1>
				{{ $post->content }}
			<h3>Submitted by:</h3>
				{{ $post->created_by }}
		</div>
		<div class="col-sm-2">
			<div class="row">
				<img src="#" class="img-responsive center block {{(!is_null($user_vote) && $user_vote->vote) ? 'active' : ''}}" data-vote="1" data-post-id="{{ $post->id }}">
			</div>
		</div>
	</div>
@stop