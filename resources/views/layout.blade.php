<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Eros Gonzàlez i Garcia. Based on Mark Otto, Jacob Thornton, and Bootstrap contributors work">
    <meta name="generator" content="Hugo 0.83.1">
    <title>@yield("title")</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/svg" href="favicon.svg">

    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset("/css/styles.css/") }}" rel="stylesheet">
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("links.show") }}">mylnks</a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route("links.index") }}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("links.index") }}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-8">
                    @yield("content")
                </div>
            </div>
        </div>
    </main>

    <!-- Fixed footer -->
    <footer class="footer mt-auto bg-dark fixed-bottom">
        <div class="container text-center">
            <span class="text-muted">mylnks &nbsp|&nbsp Eros Gonzàlez i Garcia - Acrecenta - juny 2021 &nbsp|&nbsp Laravel v{{ Illuminate\Foundation\Application::VERSION }} - PHP v{{ PHP_VERSION }}</span>
        </div>
    </footer>
    <!--
    <footer>
        <div>
            <span class="text-muted">mylnks &nbsp|&nbsp Eros Gonzàlez i Garcia - Acrecenta - juny 2021 &nbsp|&nbsp Laravel v{{ Illuminate\Foundation\Application::VERSION }} - PHP v{{ PHP_VERSION }}</span>
        </div>
    </footer>
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>
</html>
