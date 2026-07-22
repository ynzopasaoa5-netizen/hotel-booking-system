<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Hotel Booking System')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            🏨 <span>Luxury</span> Hotel
        </a>

        <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                @auth

                    @if(auth()->user()->role == 'admin')

                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.dashboard') }}">

                                Dashboard

                            </a>
                        </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('booking.index') }}">

                            My Bookings

                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            <i class="fa fa-user-circle"></i>

                            {{ auth()->user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <span class="dropdown-item-text">

                                    Logged in as

                                    <strong>{{ auth()->user()->role }}</strong>

                                </span>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form action="{{ route('logout') }}"
                                      method="POST">

                                    @csrf

                                    <button class="dropdown-item text-danger">

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                @else

                    <li class="nav-item">

                        <a class="nav-link"
                           href="{{ route('login') }}">

                            Login

                        </a>

                    </li>

                    <li class="nav-item ms-lg-3">

                        <a href="{{ route('register') }}"
                           class="btn btn-gold">

                            Register

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<!-- ================= PAGE CONTENT ================= -->

<main class="py-5">

    @yield('content')

</main>

<!-- ================= FOOTER ================= -->

<footer>

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <h5>Luxury Hotel</h5>

                <p>

                    Experience comfort, elegance,
                    and world-class hospitality.

                </p>

            </div>

            <div class="col-md-4">

                <h5>Quick Links</h5>

                <p>

                    <a href="{{ route('home') }}">Home</a>

                </p>

                @auth

                    <p>

                        <a href="{{ route('booking.index') }}">

                            My Bookings

                        </a>

                    </p>

                @endauth

            </div>

            <div class="col-md-4">

                <h5>Contact</h5>

                <p>

                    📍 Pangasinan, Philippines

                </p>

                <p>

                    📞 +63 912 345 6789

                </p>

                <p>

                    ✉ info@luxuryhotel.com

                </p>

            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center">

            © {{ date('Y') }}

            Luxury Hotel Booking System

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>