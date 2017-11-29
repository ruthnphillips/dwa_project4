<!DOCTYPE html>
<html lang="en">
<head>
  <title>
      @yield('title', 'Scouted')
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/scouted.css" type='text/css' rel='stylesheet'>

  @stack('head')
</head>
<body>

    @include('layouts.navbar') {{-- Include nav bar file --}}

<section>
    @yield('content')
</section>

    @include('layouts.footer') {{-- Include footer file --}}

</body>
</html>
