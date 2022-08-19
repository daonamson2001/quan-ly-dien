@include('head')
<body >

@include('layouts.jumbotron')

@include('layouts.header')

<div class="container px-0" style="margin-top:30px">
  @yield('content')
</div>

@include('layouts.footer')

</body>


</html>