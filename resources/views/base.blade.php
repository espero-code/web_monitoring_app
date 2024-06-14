<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TrackApp - Mesure de Performances en Temps Réel')</title> <!-- Titre de la page avec fallback -->
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Meta balises pour le référencement -->
    <meta name="description"
        content="Application de mesure de performances en temps réel, TrackApp vous permet de surveiller et d'optimiser vos performances avec facilité.">
    <meta name="keywords"
        content="TrackApp, mesure de performances, temps réel, surveillance, optimisation, application web">
    <meta name="author" content="TrackApp">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://www.trackapp.com/"> <!-- URL canonique de votre site -->

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.trackapp.com/">
    <meta property="og:title" content="TrackApp - Application de Mesure de Performances en Temps Réel">
    <meta property="og:description"
        content="Application de mesure de performances en temps réel, TrackApp vous permet de surveiller et d'optimiser vos performances avec facilité.">
    <meta property="og:image" content="https://www.trackapp.com/images/trackapp-logo.png">
    <!-- URL de l'image Open Graph -->

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.trackapp.com/">
    <meta property="twitter:title" content="TrackApp - Application de Mesure de Performances en Temps Réel">
    <meta property="twitter:description"
        content="Application de mesure de performances en temps réel, TrackApp vous permet de surveiller et d'optimiser vos performances avec facilité.">
    <meta property="twitter:image" content="https://www.trackapp.com/images/trackapp-logo.png">
    <!-- URL de l'image Twitter -->

</head>

<body>


    <main class="container-fluid px-0">
        <div class="page-content">
            @yield('content')
        </div>
    </main>



    <!-- Include Bootstrap JS and other scripts -->
    <script src="{{ asset('assets/js/library.js') }}"></script> <!-- Include your custom JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!-- Bootstrap tooltips initialization -->
    <script>
        // Select all elements with data-bs-toggle="tooltip" attribute
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        // Initialize each tooltip using Bootstrap's Tooltip class
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Dark/Light Mode Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const icon = themeToggle.querySelector('i');
            if (body.classList.contains('dark-mode')) {
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        });
    </script>

    @yield('scripts') <!-- Area to include page-specific scripts -->

    @if (app()->environment('production'))
        @php
            // Read manifest.json file to get compiled JS and CSS file paths
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <!-- Include compiled JS file in production -->
        <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
        <!-- Include compiled CSS file in production -->
        <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    @else
        <!-- Use Vite for development -->
        @vite(['resources/js/app.js'])
    @endif

</body>

</html>
