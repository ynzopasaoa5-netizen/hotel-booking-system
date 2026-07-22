@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <!-- Room Image -->
        <div class="col-lg-6">

            @if($room->image)

                <img src="{{ asset('storage/'.$room->image) }}"
                     class="img-fluid rounded shadow-lg w-100"
                     style="height:450px; object-fit:cover;">

            @else

                <img src="https://via.placeholder.com/800x500"
                     class="img-fluid rounded shadow-lg">

            @endif

        </div>

        <!-- Room Information -->
        <div class="col-lg-6">

            <span class="badge bg-success mb-2">

                {{ $room->status }}

            </span>

            <h1 class="fw-bold">

                Room {{ $room->room_number }}

            </h1>

            <h3 class="text-primary">

                {{ $room->room_type }}

            </h3>

            <div class="mb-3">

                ⭐⭐⭐⭐⭐

                <small class="text-muted">

                    5-Star Hotel Experience

                </small>

            </div>

            <h2 class="text-success fw-bold">

                ₱{{ number_format($room->price,2) }}

                <small class="fs-5 text-muted">

                    / Night

                </small>

            </h2>

            <hr>

            <p>

                {{ $room->description }}

            </p>

            <div class="row mt-4">

                <div class="col-6">

                    <div class="card">

                        <div class="card-body text-center">

                            👥

                            <h6 class="mt-2">

                                Capacity

                            </h6>

                            <strong>

                                {{ $room->capacity }} Guests

                            </strong>

                        </div>

                    </div>

                </div>

                <div class="col-6">

                    <div class="card">

                        <div class="card-body text-center">

                            📍

                            <h6 class="mt-2">

                                Location

                            </h6>

                            <strong>

                                Hotel Booking Resort

                            </strong>

                        </div>

                    </div>

                </div>

            </div>

            <h4 class="mt-5">

                Room Amenities

            </h4>

            <div class="row">

                <div class="col-md-6">

                    <ul class="list-group">

                        <li class="list-group-item">📶 Free WiFi</li>

                        <li class="list-group-item">❄ Air Conditioning</li>

                        <li class="list-group-item">📺 Smart TV</li>

                        <li class="list-group-item">☕ Free Breakfast</li>

                    </ul>

                </div>

                <div class="col-md-6">

                    <ul class="list-group">

                        <li class="list-group-item">🏊 Swimming Pool</li>

                        <li class="list-group-item">🚗 Free Parking</li>

                        <li class="list-group-item">🧺 Laundry Service</li>

                        <li class="list-group-item">🛎 24/7 Room Service</li>

                    </ul>

                </div>

            </div>

            <div class="card mt-4">

                <div class="card-header bg-dark text-white">

                    Hotel Information

                </div>

                <div class="card-body">

                    <p><strong>Check-in:</strong> 2:00 PM</p>

                    <p><strong>Check-out:</strong> 12:00 PM</p>

                    <p><strong>Contact:</strong> +63 912 345 6789</p>

                    <p><strong>Email:</strong> hotelbooking@gmail.com</p>

                </div>

            </div>

            <div class="d-grid gap-2 mt-4">

                @auth

                    <a href="{{ route('booking.create',$room) }}"
                       class="btn btn-success btn-lg">

                        🛏 Book This Room

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="btn btn-primary btn-lg">

                        Login to Book

                    </a>

                @endauth

                <a href="{{ route('home') }}"
                   class="btn btn-secondary">

                    ← Back to Home

                </a>

            </div>

        </div>

    </div>

</div>

@endsection