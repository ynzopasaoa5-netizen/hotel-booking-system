@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <!-- Booking Form -->
        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h3 class="mb-0">
                        Book Room {{ $room->room_number }}
                    </h3>

                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    {{-- Error Message --}}
                    @if(session('error'))

                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>

                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('booking.store', $room) }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Check In

                            </label>

                            <input
                                type="date"
                                name="check_in"
                                id="check_in"
                                class="form-control"
                                value="{{ old('check_in') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Check Out

                            </label>

                            <input
                                type="date"
                                name="check_out"
                                id="check_out"
                                class="form-control"
                                value="{{ old('check_out') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Number of Guests

                            </label>

                            <input
                                type="number"
                                name="guests"
                                class="form-control"
                                min="1"
                                max="{{ $room->capacity }}"
                                value="{{ old('guests',1) }}"
                                required>

                            <small class="text-muted">

                                Maximum {{ $room->capacity }} guest(s)

                            </small>

                        </div>

                        <button class="btn btn-success btn-lg">

                            <i class="fa fa-calendar-check"></i>

                            Confirm Booking

                        </button>

                        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">

                            Cancel

                        </a>

                    </form>

                </div>

            </div>

        </div>

        <!-- Booking Summary -->
        <div class="col-lg-4">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    Booking Summary

                </div>

                <div class="card-body">

                    <h5>

                        Room {{ $room->room_number }}

                    </h5>

                    <hr>

                    <p>

                        <strong>Room Type:</strong>

                        {{ $room->room_type }}

                    </p>

                    <p>

                        <strong>Capacity:</strong>

                        {{ $room->capacity }} Guest(s)

                    </p>

                    <p>

                        <strong>Price/Night:</strong>

                        ₱{{ number_format($room->price,2) }}

                    </p>

                    <hr>

                    <p>

                        Nights:

                        <span id="days">

                            0

                        </span>

                    </p>

                    <h4>

                        Total Price

                        <br>

                        <span class="text-success">

                            ₱<span id="total">0.00</span>

                        </span>

                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const price = {{ $room->price }};

const checkIn = document.getElementById('check_in');

const checkOut = document.getElementById('check_out');

function calculateBooking(){

    if(checkIn.value && checkOut.value){

        let start = new Date(checkIn.value);

        let end = new Date(checkOut.value);

        let diff = (end - start) / (1000 * 60 * 60 * 24);

        if(diff > 0){

            document.getElementById('days').innerText = diff;

            document.getElementById('total').innerText =

                (diff * price).toLocaleString(undefined,{

                    minimumFractionDigits:2,

                    maximumFractionDigits:2

                });

        }else{

            document.getElementById('days').innerText = 0;

            document.getElementById('total').innerText = "0.00";

        }

    }else{

        document.getElementById('days').innerText = 0;

        document.getElementById('total').innerText = "0.00";

    }

}

checkIn.addEventListener('change', calculateBooking);

checkOut.addEventListener('change', calculateBooking);

</script>

@endsection