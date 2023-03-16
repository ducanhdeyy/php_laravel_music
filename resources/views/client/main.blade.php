<!DOCTYPE html>
<html lang="en">

<head>
  @include('client.common.head')
</head>

<body class="layout-row">
@include('client.common.nav')

<div id="main" class="layout-column flex bg-white">
    @include('client.common.header')
    @yield('content')
    @include('client.common.footer')
</div>
@yield('js')
@include('client.common.js')
</body>

</html>
