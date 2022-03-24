<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Characters')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    @if(session()->get('success'))
        <div class="toast align-items-center text-white bg-dark border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    @yield('content')
    <div id="footer-div" class="text-center d-flex align-items-center justify-content-center">
        <footer class="text-center">
            <a role="button" class="btn btn-dark border-0 text-light"
                href="@if (Route::currentRouteName() != 'characters.index'){{ route('characters.index') }}@else#@endif">All
                Characters</a>
        </footer>
    </div>
    @yield('js')
</body>

</html>
