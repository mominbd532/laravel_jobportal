<!doctype html>
<html lang="en">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Job Portal</title>


    @include('partial.head')
</head>
<body>
<div id="app">
@include('partial.nav')
@yield('content')
@include('partial.footer')

</div>

</body>
</html>