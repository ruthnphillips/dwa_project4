<!DOCTYPE html>
<html lang="en">
<head>
  <title>
      @yield('title', 'Social Example')
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/foobooks.css') }}" type='text/css' rel='stylesheet'>
  @stack('head')
</head>
<body>
    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

    @include('layouts.navbar') {{-- Include nav bar file --}}


<section>
    @yield('content')
</section>

@include('layouts.footer') {{-- Include footer file --}}

</body>
</html>
