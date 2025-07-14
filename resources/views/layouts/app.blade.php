<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Sistem Keuangan Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
    @auth
        @if(Auth::user()->isAdmin())
            <div class="d-flex">
                @include('partials.sidebar')
                <div class="flex-grow-1 p-4">
                    @yield('content')
                </div>
            </div>
        @else
            @include('partials.navbar')
            
            <div class="flex-grow-1 container my-4">
                @yield('content')
            </div>

            @include('partials.footer')
        @endif
    @else
        @include('partials.navbar')

        <div class="flex-grow-1  ">
            @yield('content')
        </div>

        @include('partials.footer')
    @endauth
</body>
</html>
