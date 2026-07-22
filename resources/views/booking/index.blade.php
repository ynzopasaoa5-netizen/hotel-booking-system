@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">

        My Bookings

    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>Room</th>

                <th>Check In</th>

                <th>Check Out</th>

                <th>Guests</th>

                <th>Total</th>

                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td>{{ $booking->room->room_number }}</td>

                    <td>{{ $booking->check_in }}</td>

                    <td>{{ $booking->check_out }}</td>

                    <td>{{ $booking->guests }}</td>

                    <td>₱{{ number_format($booking->total_price,2) }}</td>

                    <td>

                        <span class="badge bg-warning">

                            {{ $booking->status }}

                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        No bookings yet.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection