<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Scouted')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/scouted.css') }}" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    <header>
        <a href='/'><img
            src="{{ asset('img/logo2.png') }}"
            style='width:200px'
            alt='Scouted Logo'></a>
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>
        <a href='https://github.com/ruthnphillips/dwa_project4'><i class='fa fa-github'></i></a>&nbsp;
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>
