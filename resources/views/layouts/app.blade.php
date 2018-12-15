<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="{{asset('js/app.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <title>{{config('app.name', 'LaraCMS')}}</title>
</head>
<body>
  @include('inc.navbar')
  <div class="container">
      @yield('content')
  </div>
</body>
</html>