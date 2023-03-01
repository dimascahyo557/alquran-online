<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al-Quranku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="shortcut icon" href="{{ asset('image/alquran.png') }}" type="image/x-icon">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        #footer {
            justify-self: flex-end;
        }
    </style>

    @yield('style')
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand m-auto" href="{{ route('home') }}">Al-Quranku</a>
        </div>
    </nav>
    <nav class="navbar navbar-expand bg-body-tertiary position-sticky top-0 shadow-sm">
        <div class="container-fluid">
            <div class="navbar-nav m-auto">
                <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                <a class="nav-link" href="{{ route('surat.list') }}">Baca Al-Quran</a>
                <a class="nav-link" href="#">Tentang Aplikasi</a>
            </div>
        </div>
    </nav>
    
    <main class="m-auto" style="max-width: 600px; width: 100%;">
        <div class="container w-100 my-3">
            @yield('content')
        </div>
    </main>

    <footer class="navbar navbar-expand-lg bg-body-tertiary" id="footer">
        <div class="container-fluid">
            <div class="mx-auto my-3 text-center">
                <div class="text-muted">
                    &copy; 2023 Al-Quranku
                </div>
                <small>
                    @yield('credit')
                </small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
