<!DOCTYPE html>
<html>
    <head>
        <title>Halo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- @vite('resources/css/app.css') --}}
    </head>
    <body>
        @yield('content')
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12 p-3 border border-dark">Halo Laravel</div>
            </div>
            <div class="row">  <!-- [rootdir]/includes/sidenav.blade.php -->
                <div class="col-md-2 border border-dark">@include('includes.sidenav')</div>
                <div class="col-md-10 border border-dark p-2">@yield('content')</div>
            </div>
        </div> --}}
    </body>
</html>

@yield('script')