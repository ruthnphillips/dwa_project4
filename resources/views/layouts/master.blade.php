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
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href="css/scouted.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>
    <div id="wrapper">

        <div id="header">
            <header>
                <a href="/">
            		<img
                    src='img/logo2.png'
                    style='width:200px'
                    alt='Scouted Logo'></a>
            </header>
        </div>

        <div id="content">
        	@yield('content')
        </div>

        <div id="footer">
    	    <footer>
                <a href='https://github.com/ruthnphillips/dwa_project4'><i class='fa fa-github'></i></a>&nbsp;
                &copy; {{ date('Y') }}
    	    </footer>
        </div>
        @stack('body')
    </div>
</body>
</html>
