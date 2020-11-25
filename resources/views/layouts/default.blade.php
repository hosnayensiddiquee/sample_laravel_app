<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.head')
</head>
<body>
@include('layouts.includes.header')

<div class="container">

    @yield('content')

    <hr>

    <footer>
        <p>&copy; Company <?php echo date('Y'); ?></p>
    </footer>
</div> <!-- /container -->
@include('layouts.includes.footer')
</body>
</html>
