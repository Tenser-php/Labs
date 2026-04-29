<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Lab03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .jumbotron {
            background-color: #e9ecef;
            padding: 3rem 2rem;
        }
        .side-menu .list-group-item.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .content-section {
            padding: 2rem 0;
        }
    </style>
</head>
<body>
    {{-- Top Navigation Bar --}}
    @include('partials.nav')

    {{-- Banner / Jumbotron --}}
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-5 fw-bold">{{ $title }}</h1>
            <p class="lead">{{ $customText }}</p>
            <a href="#" class="btn btn-primary btn-lg">Example button</a>
        </div>
    </div>

    {{-- Main Content: 3-column layout for Home Page --}}
    <div class="container content-section">
        <div class="row">
            {{-- Side Menu --}}
            <div class="col-md-3">
                @include('partials.sidemenu')
            </div>

            {{-- Page Content --}}
            <div class="col-md-5">
                @yield('content')
            </div>

            {{-- List of URLs --}}
            <div class="col-md-4">
                @yield('urls')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
