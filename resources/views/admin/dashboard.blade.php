@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Hotel Dashboard
            </h2>

            <p class="text-muted mb-0">
                Welcome back,
                <strong>{{ auth()->user()->name }}</strong>
            </p>

        </div>

        <a href="{{ route('home') }}" class="btn btn-dark px-4">

            <i class="fa-solid fa-globe me-2"></i>

            View Website

        </a>

    </div>

    <!-- Main Statistics -->

    <div class="row g-4 mb-4">

        <div class="col-lg-4 col-md-6">

            <div class="card dashboard-card bg-primary text-white border-0 shadow-lg">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Total Rooms</small>

                            <h2 class="fw-bold mt-2">

                                {{ $rooms }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-bed fa-3x opacity-75"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card dashboard-card bg-success text-white border-0 shadow-lg">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Total Bookings</small>

                            <h2 class="fw-bold mt-2">

                                {{ $bookings }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-calendar-check fa-3x opacity-75"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card dashboard-card bg-warning text-dark border-0 shadow-lg">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Total Users</small>

                            <h2 class="fw-bold mt-2">

                                {{ $users }}

                            </h2>

                        </div>

                        <i class="fa-solid fa-users fa-3x opacity-75"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Booking Status -->

    <h4 class="fw-bold mb-3">

        Booking Overview

    </h4>

    <div class="row g-4 mb-5">

        <div class="col-lg-4">

            <div class="card dashboard-card border-0 shadow bg-warning text-white">

                <div class="card-body text-center">

                    <i class="fa-solid fa-clock fa-2x mb-3"></i>

                    <h5>Pending</h5>

                    <h1 class="fw-bold">

                        {{ $pending }}

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card dashboard-card border-0 shadow bg-success text-white">

                <div class="card-body text-center">

                    <i class="fa-solid fa-circle-check fa-2x mb-3"></i>

                    <h5>Approved</h5>

                    <h1 class="fw-bold">

                        {{ $approved }}

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card dashboard-card border-0 shadow bg-danger text-white">

                <div class="card-body text-center">

                    <i class="fa-solid fa-circle-xmark fa-2x mb-3"></i>

                    <h5>Rejected</h5>

                    <h1 class="fw-bold">

                        {{ $rejected }}

                    </h1>

                </div>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white py-3">

            <h4 class="fw-bold mb-0">

                <i class="fa-solid fa-bolt text-warning me-2"></i>

                Quick Actions

            </h4>

        </div>

        <div class="card-body">

            <div class="row g-4">

                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.rooms.create') }}"
                       class="btn btn-primary w-100 py-4">

                        <i class="fa-solid fa-plus fa-2x d-block mb-3"></i>

                        Add Room

                    </a>

                </div>

                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.rooms.index') }}"
                       class="btn btn-success w-100 py-4">

                        <i class="fa-solid fa-bed fa-2x d-block mb-3"></i>

                        Manage Rooms

                    </a>

                </div>

                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('admin.bookings.index') }}"
                       class="btn btn-warning text-dark w-100 py-4">

                        <i class="fa-solid fa-calendar-days fa-2x d-block mb-3"></i>

                        Manage Bookings

                    </a>

                </div>

                <div class="col-lg-3 col-md-6">

                    <a href="{{ route('home') }}"
                       class="btn btn-dark w-100 py-4">

                        <i class="fa-solid fa-globe fa-2x d-block mb-3"></i>

                        Visit Website

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Dashboard Ready for Future Charts -->

    <div class="card border-0 shadow-lg rounded-4 mt-5">

        <div class="card-header bg-white">

            <h4 class="fw-bold mb-0">

                <i class="fa-solid fa-chart-line text-primary me-2"></i>

                Booking Analytics

            </h4>

        </div>

        <div class="card-body text-center py-5">

            <i class="fa-solid fa-chart-column fa-5x text-secondary mb-3"></i>

            <h4>

                Charts Coming Soon

            </h4>

            <p class="text-muted">

                Monthly bookings, revenue reports, occupancy rate,
                and hotel analytics will appear here.

            </p>

        </div>

    </div>

</div>

@endsection