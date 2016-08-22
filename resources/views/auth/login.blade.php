@extends('layouts.master')

@section('content')
<h1>Login</h1>
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="post" action="{{  action('Auth\AuthController@postLogin') }}">
         {!! csrf_field() !!}
             <div class="form-group">
                 <label class="col-sm-2 control-label" for="email">Email:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email">@include ('partials.errors', ['field' => 'email'])
                </div>
             </div>
             <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">Password:</label>
                 <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password">@include ('partials.errors', ['field' => 'password'])
                 </div>
             </div>
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@stop