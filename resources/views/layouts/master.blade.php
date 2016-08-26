<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/login">Login</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="field" value="title" checked>Title</label>
                        <label class="radio-inline"><input type="radio" name="field" value="url">URL</label>
                        <label class="radio-inline"><input type="radio" name="field" value="content">Description</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

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
            {{--<a href={{ action('Auth\AuthController@getLogout')  }}>Logout</a>--}}
        </div>
    @endif

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/common.js"></script>
    @yield('bottom-scripts')

</body>
</html>