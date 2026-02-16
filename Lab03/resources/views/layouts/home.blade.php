<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pricing') }}">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-dark text-white p-5">
        <div class="container">
            <h1 class="fw-bold fst-italic">@yield('title')</h1>
            <p class="mb-3">@yield('description')</p>
            <a href="{{ route('products') }}" class="btn btn-primary">View Products</a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="container mt-4 mb-4">
        <div class="row">
            <!-- Side Menu -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action active">Home</a>
                    <a href="{{ route('products') }}" class="list-group-item list-group-item-action">Products</a>
                    <a href="{{ route('pricing') }}" class="list-group-item list-group-item-action">Pricing</a>
                    <a href="{{ route('contact') }}" class="list-group-item list-group-item-action">Contact</a>
                </div>
            </div>
            <!-- Page Content -->
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-secondary pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-white">About Us</h5>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white">Follow Us</h5>
                    <ul class="list-unstyled">
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                        <li>X</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white">Contact Us</h5>
                    <p>Email: Abdullah@Sharqawi.com</p>
                    <p>Phone: 0560616911</p>
                    <p>Address: Riyadh, Saudi Arabia</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>