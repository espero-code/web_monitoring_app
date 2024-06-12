<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css'])
</head>

<body>
    <header class="sticky-top d-flex p-2 shadow-lg navbar-light bg-primary jsb">
        <h2 class="pr-2">
            <a href="{{ route('home') }}">
                TrackApp
            </a>
        </h2>
        <div class="d-flex gap-5 aic">
            <a href="{{ route('admin.modules.index') }}" target="_blank">
                <i class="fas fa-gear"></i>
            </a>
            <div class="dropdown">
                <div class="position-relative dropdown-toggle d-none" id="notification-icon" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger position-absolute bottom-0">0</span>
                </div>
                <ul class="dropdown-menu" id="notification-list">
                </ul>
            </div>
        </div>
    </header>
    <div class="banner navbar-light bg-primary text-light shadow-lg">
        <div class="container">
            <div class="jumbotron py-5">
                <h1 class="display-4">Suivi de performances en temps réel.</h1>
                <hr class="my-4">
                <p class="lead">
                    Découvrez les performances, le fonctionnement et la disponibilité de vos différents appareils
                    connectés.
                </p>
                <p class="lead">
                    Analysez les données pour mieux optimiser leur utilisation.
                </p>

            </div>
        </div>
    </div>

    <main class="container-fluid px-0">
        <div class="page-content">
            @yield('content')
        </div>
    </main>



    {{-- <footer class="footer mt-auto py-3 bg-primary position-fixed bottom-0 w-100 text-light shadow-lg">
        <div class="container">
            <span class="text-muted "></span>
        </div>
    </footer> --}}



    <!-- Inclure Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @yield('scripts')
    @vite(['resources/js/app.js'])
</body>

</html>
