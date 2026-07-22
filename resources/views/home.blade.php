@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->

<section class="hero-section">

    <div class="hero-overlay">

        <div class="container">

            <div class="row align-items-center" style="min-height:85vh;">

                <div class="col-lg-7 text-white">

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                        ⭐ Luxury Hotel Experience
                    </span>

                    <h1 class="display-3 fw-bold">

                        Discover Your Perfect Stay

                    </h1>

                    <p class="lead mt-4">

                        Enjoy luxury accommodations, exceptional service,
                        and unforgettable experiences.

                    </p>

                    <div class="mt-4">

                        <a href="#rooms" class="btn btn-gold btn-lg me-2">

                            Book Now

                        </a>

                        <a href="#features"
                           class="btn btn-outline-light btn-lg">

                            Explore

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= SEARCH ================= -->

<div class="container mt-5">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card shadow-lg border-0 rounded-4 mb-5">

<div class="card-body p-4">

<form action="{{ route('home') }}" method="GET">

<div class="row g-3">

<div class="col-md-4">

<input
type="text"
name="search"
class="form-control form-control-lg"
placeholder="Search room..."
value="{{ request('search') }}">

</div>

<div class="col-md-3">

<select
name="type"
class="form-select form-select-lg">

<option value="">

All Room Types

</option>

@foreach($roomTypes as $type)

<option
value="{{ $type }}"
{{ request('type') == $type ? 'selected' : '' }}>

{{ $type }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<select
name="capacity"
class="form-select form-select-lg">

<option value="">Capacity</option>

<option value="1">1+</option>

<option value="2">2+</option>

<option value="4">4+</option>

<option value="6">6+</option>

</select>

</div>

<div class="col-md-2 d-grid">

<button class="btn btn-primary btn-lg">

<i class="fa fa-search"></i>

Search

</button>

</div>

</div>

</form>

</div>

</div>

<!-- ================= FEATURES ================= -->

<section id="features" class="mb-5">

<div class="text-center mb-5">

<h2 class="fw-bold">

Why Choose Us

</h2>

<p class="text-muted">

Luxury stays with world-class amenities.

</p>

</div>

<div class="row">

<div class="col-md-3">

<div class="card text-center shadow border-0 h-100">

<div class="card-body">

<i class="fa-solid fa-wifi fa-3x text-primary mb-3"></i>

<h5>Free WiFi</h5>

<p class="text-muted">

Fast and secure internet access.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow border-0 h-100">

<div class="card-body">

<i class="fa-solid fa-person-swimming fa-3x text-info mb-3"></i>

<h5>Swimming Pool</h5>

<p class="text-muted">

Relax and enjoy our luxury pool.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow border-0 h-100">

<div class="card-body">

<i class="fa-solid fa-utensils fa-3x text-danger mb-3"></i>

<h5>Restaurant</h5>

<p class="text-muted">

Fine dining all day long.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow border-0 h-100">

<div class="card-body">

<i class="fa-solid fa-square-parking fa-3x text-success mb-3"></i>

<h5>Free Parking</h5>

<p class="text-muted">

Safe and spacious parking.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================= ROOMS ================= -->

<section id="rooms">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="fw-bold">

Available Rooms

</h2>

<span class="badge bg-primary fs-6">

{{ $rooms->count() }} Rooms Available

</span>

</div>

<div class="row g-4">

@forelse($rooms as $room)
<div class="col-lg-4 col-md-6">

    <div class="card room-card border-0 shadow-lg h-100">

        <div class="position-relative overflow-hidden">

            @if($room->image)

    <img
        src="{{ asset('uploads/rooms/'.$room->image) }}"
        class="card-img-top"
        style="height:250px;object-fit:cover;">

@else

    <img
        src="https://via.placeholder.com/600x400?text=No+Image"
        class="card-img-top"
        style="height:250px;object-fit:cover;">

@endif

            <span class="badge bg-success room-status">

                {{ $room->status }}

            </span>

            <span class="price-badge">

                ₱{{ number_format($room->price,2) }}

                <small>/night</small>

            </span>

        </div>

        <div class="card-body">

            <h4 class="fw-bold">

                Room {{ $room->room_number }}

            </h4>

            <span class="badge bg-primary mb-3">

                {{ $room->room_type }}

            </span>

            <p class="text-muted">

                {{ \Illuminate\Support\Str::limit($room->description,120) }}

            </p>

            <hr>

            <div class="row text-center">

                <div class="col-6">

                    <i class="fa-solid fa-users text-primary fa-lg"></i>

                    <p class="mb-0 mt-2">

                        {{ $room->capacity }} Guests

                    </p>

                </div>

                <div class="col-6">

                    <i class="fa-solid fa-bed text-success fa-lg"></i>

                    <p class="mb-0 mt-2">

                        {{ $room->room_type }}

                    </p>

                </div>

            </div>

        </div>

        <div class="card-footer bg-white border-0">

            <div class="d-grid gap-2">

                <a
                    href="{{ route('rooms.show',$room) }}"
                    class="btn btn-outline-dark">

                    <i class="fa fa-eye"></i>

                    View Details

                </a>

                @auth

                    <a
                        href="{{ route('booking.create',$room) }}"
                        class="btn btn-success">

                        <i class="fa fa-calendar-check"></i>

                        Book Now

                    </a>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-primary">

                        Login to Book

                    </a>

                @endauth

            </div>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning text-center p-5">

        <h3>No Rooms Available</h3>

        <p>

            Please check back again soon.

        </p>

    </div>

</div>

@endforelse

</div>

</section>

<!-- ================= HOTEL STATISTICS ================= -->

<section class="py-5">

<div class="row text-center">

<div class="col-md-3">

<h1 class="fw-bold text-primary">

120+

</h1>

<p>Luxury Rooms</p>

</div>

<div class="col-md-3">

<h1 class="fw-bold text-success">

5000+

</h1>

<p>Happy Guests</p>

</div>

<div class="col-md-3">

<h1 class="fw-bold text-warning">

24/7

</h1>

<p>Customer Support</p>

</div>

<div class="col-md-3">

<h1 class="fw-bold text-danger">

15+

</h1>

<p>Years Experience</p>

</div>

</div>

</section>
<!-- ================= TESTIMONIALS ================= -->

<section class="py-5 bg-light rounded-4 my-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                What Our Guests Say

            </h2>

            <p class="text-muted">

                Trusted by hundreds of satisfied guests.

            </p>

        </div>

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body">

                        <div class="mb-3 text-warning">

                            ★★★★★

                        </div>

                        <p>

                            "The room was spotless, the staff were welcoming,
                            and the booking process was incredibly easy."

                        </p>

                        <hr>

                        <strong>John D.</strong>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body">

                        <div class="mb-3 text-warning">

                            ★★★★★

                        </div>

                        <p>

                            "Amazing amenities and excellent service.
                            Definitely staying here again!"

                        </p>

                        <hr>

                        <strong>Maria S.</strong>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow h-100">

                    <div class="card-body">

                        <div class="mb-3 text-warning">

                            ★★★★★

                        </div>

                        <p>

                            "The booking system was simple and the room exceeded
                            our expectations."

                        </p>

                        <hr>

                        <strong>James C.</strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= CALL TO ACTION ================= -->

<section class="bg-primary text-white rounded-4 p-5 text-center my-5">

    <h2 class="fw-bold">

        Ready for Your Next Stay?

    </h2>

    <p class="lead">

        Reserve your room today and enjoy comfort, luxury,
        and unforgettable experiences.

    </p>

    @guest

        <a href="{{ route('register') }}"
           class="btn btn-warning btn-lg mt-3">

            Register & Book Now

        </a>

    @else

        <a href="#rooms"
           class="btn btn-warning btn-lg mt-3">

            Browse Rooms

        </a>

    @endguest

</section>

</div>

@endsection