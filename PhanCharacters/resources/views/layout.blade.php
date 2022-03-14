<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Characters')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head> 

@yield('content')

</body>
<div id="footer-div" class="text-center d-flex align-items-center justify-content-center">
    <footer class="text-center">
        <a role="button" class="btn btn-dark border-0 text-light" href="@if (Route::currentRouteName() != 'characters.index'){{ route('characters.index') }}@else#@endif">All Characters</a>
    </footer>
</div>
</html>