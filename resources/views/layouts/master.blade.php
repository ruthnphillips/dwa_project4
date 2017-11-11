<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Scouted')
    </title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type='text/css' rel='stylesheet'>
	<link href="css/scouted.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
        <a href="/">
    		<img
            src='img/logo2.png'
            style='width:200px'
            alt='Scouted Logo'></a>
	</header>

    <div>
		@yield('content')
	</div>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

    @stack('body')

</body>
</html>
