<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        body *,
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .web-admin {
            background-color: #fafafa;
        }

        .web-admin .row {
            height: 100vh;
        }

        .web-admin a {
            /* color: inherit; */
            text-decoration: inherit;
        }

        .web-admin h2 {
            color: black;
            text-transform: uppercase;
        }

        .web-admin input {
            border-radius: 0;
            border: 1px solid #9b9b9b;
            }
            .web-admin .btn {
                box-shadow: 1px 2px 3px #9b9b9b
            }

        .web-admin table {
            border: 1px solid #9b9b9b;
        }

        .btn {
            border-radius: 0;
        }
    </style>

</head>

<body>
    <div class="container-fluid web-admin">
        <div class="row gx-0 gy-0">
            <nav id="sidebar" class="col-md-2 border-end d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h2>
                        <a href="{{ route('home') }}">
                            TrackApp
                        </a>
                    </h2>
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.modules.index') }}">
                                Modules
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.measured_types.index') }}">
                                Measured Types
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.data_collecteds.index') }}">
                                Data Collecteds
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main id="main-content" class="col-md-10">
                <h2 class="border-bottom m-0 p-3">Dashboard</h2>
                <div class="p-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @yield('scripts')

</body>

</html>
