<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="bg-light">

<div class="wrapper d-flex">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-header">

            <div class="hotel-icon">

                <i class="fa-solid fa-hotel"></i>

            </div>

            <h4>

                Hotel Admin

            </h4>

            <small>

                Management System

            </small>

        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-chart-pie"></i>

                    <span>Dashboard</span>

                </a>

            </li>

            <li>

                <a href="{{ route('admin.rooms.index') }}"
                   class="{{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-bed"></i>

                    <span>Rooms</span>

                </a>

            </li>

            <li>

                <a href="{{ route('admin.bookings.index') }}"
                   class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-calendar-check"></i>

                    <span>Bookings</span>

                </a>

            </li>

            <li>

                <a href="{{ route('home') }}">

                    <i class="fa-solid fa-globe"></i>

                    <span>View Website</span>

                </a>

            </li>

        </ul>

        <div class="sidebar-footer">

            <div class="admin-info">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

                <div>

                    <strong>{{ auth()->user()->name }}</strong>

                    <small>Administrator</small>

                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-danger w-100 mt-3">

                    <i class="fa-solid fa-right-from-bracket me-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- MAIN -->

    <main class="main-content">

        <!-- TOP BAR -->

        <nav class="topbar shadow-sm">

            <div>

                <h5 class="mb-0 fw-bold">

                    Hotel Booking Management

                </h5>

            </div>

            <div>

                <span class="text-muted me-3">

                    <i class="fa-solid fa-user-shield"></i>

                    {{ auth()->user()->name }}

                </span>

            </div>

        </nav>

        <div class="content-area">

            @yield('content')

        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>