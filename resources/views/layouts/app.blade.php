<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaabchepkooy Benevolent Fund</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <style>
        :root {
            --coffee-brown: #4B2E2E;
            --forest-green: #2F4F2F;
            --beige: #F5F5DC;
            --black: #000000;
            --white: #FFFFFF;
        }

        body {
            background-color: var(--beige);
            color: var(--black);
            font-family: Arial, sans-serif;
            padding-top: 80px;
        }

        .navbar {
            background-color: darkblue;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px 20px;
        }

        .navbar .nav-link, .navbar-brand {
            color: var(--white) !important;
            font-size: 1.2rem;
        }

        footer {
            background-color: var(--coffee-brown);
            color: var(--white);
            padding: 40px 0;
        }

        footer a {
            color: var(--white);
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .text-center {
            margin-top: 30px;
        }

        img {
            border-radius: 8px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Kaabchepkooy Fund</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>

                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('downloads') }}">Downloads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('media') }}">Media Centre</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('scheme') }}">Benevolent Scheme</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('burial') }}">Burial Scheme</a></li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Sign In</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif

    {{-- Page Content --}}
    <div class="container my-4">
        @yield('content')
    </div>

<!-- Contact/Feedback Form -->
@unless (Request::is('profile'))
<section class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Contact Us</h2>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Enter your full name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Enter your email address" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4"
                      placeholder="Write your message" required></textarea>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
        </div>
    </form>
</section>
@endunless


    {{-- Footer --}}
    <footer class="text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Kaabchepkooy Benevolent Fund. All rights reserved.</p>
            <p>Email: info@kaabchepkooy.org | Phone: +254 700 000 000</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
