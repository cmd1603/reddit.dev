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

@yield('content')

</body>
</html>