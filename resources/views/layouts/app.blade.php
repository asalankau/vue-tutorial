<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>

<div class="container fill">
    @yield('content')
</div>
@section('footer')
    This is the footer.
@show
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>