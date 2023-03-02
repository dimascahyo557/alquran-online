<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al-Quranku | @yield('title')</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('image/alquran.png') }}" type="image/x-icon">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    {{-- Phone Style --}}
    <link rel="stylesheet" href="{{ asset('css/phone.css') }}">

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

    <div class="phone-container">
        <div class="phone">
            <div class="phone-header">
                <div>
                    00:00
                </div>
                <div class="phone-camera"></div>
                <div>
                    <i class="fa-solid fa-signal"></i>
                    <i class="fa-solid fa-battery"></i>
                </div>
            </div>
            <div class="phone-content">

                <div class="overflow-auto h-100">
                    {{-- App Title --}}
                    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
                        <div class="container-fluid">
                            <a class="navbar-brand m-auto" href="{{ route('home') }}">Al-Quranku</a>
                        </div>
                    </nav>
                    
                    {{-- Main Content --}}
                    <main class="m-auto" style="max-width: 600px; width: 100%;">
                        <div class="container w-100 my-3">
                            @yield('content')
                        </div>
                    </main>
                
                    {{-- Content Footer --}}
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
                </div>
                
            </div>
            {{-- Bottom navigation bar --}}
            <div class="phone-bottom-navigation">
                <nav class="navbar navbar-expand bg-body-tertiary">
                    <div class="container-fluid">
                        <div class="navbar-nav w-100 justify-content-around h1">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa-solid fa-home"></i>
                            </a>
                            <a class="nav-link" href="{{ route('surat.list') }}">
                                <i class="fa-solid fa-book-quran"></i>
                            </a>
                            <a class="nav-link" href="{{ route('about-app') }}">
                                <i class="fa-solid fa-info-circle"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="phone-swipe"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>
