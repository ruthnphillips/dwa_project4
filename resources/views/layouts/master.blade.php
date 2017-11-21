<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Scouted')
    </title>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/scouted.css') }}" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>
    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

    @include('layouts.navbar') {{-- Include nav bar file --}}



    <header>

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
