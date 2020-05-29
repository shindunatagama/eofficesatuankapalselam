<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>

  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">

  @include('includes.navbar')
  @include('includes.sidebar')
  @yield('content')
  @include('includes.footer')

</div>
<!-- ./wrapper -->

@stack('prepend-script')
@include('includes.script')
@stack('addon-script')
</body>
</html>
