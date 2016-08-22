<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
</head>
<body>

@if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@yield('content')
@if (Auth::check())
    <div>
        <a href={{ action('Auth\AuthController@getLogout')  }}>Logout</a>
        <a href={{ action('Auth\AuthController@getLogout')  }}>Logout</a>
    </div>
@endif

</body>
</html>