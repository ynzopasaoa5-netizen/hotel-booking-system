@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="mb-4">
Booking Management
</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card shadow">

<div class="card-body">

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Customer</th>

<th>Room</th>

<th>Check In</th>

<th>Check Out</th>

<th>Guests</th>

<th>Total</th>

<th>Status</th>

<th width="170">Actions</th>

</tr>

</thead>

<tbody>

@forelse($bookings as $booking)

<tr>

<td>{{ $booking->id }}</td>

<td>{{ $booking->user->name }}</td>

<td>

Room {{ $booking->room->room_number }}

<br>

<small class="text-muted">

{{ $booking->room->room_type }}

</small>

</td>

<td>{{ $booking->check_in }}</td>

<td>{{ $booking->check_out }}</td>

<td>{{ $booking->guests }}</td>

<td>

₱{{ number_format($booking->total_price,2) }}

</td>

<td>

@if($booking->status=="Pending")

<span class="badge bg-warning">

Pending

</span>

@elseif($booking->status=="Approved")

<span class="badge bg-success">

Approved

</span>

@else

<span class="badge bg-danger">

Rejected

</span>

@endif

</td>

<td>

@if($booking->status=="Pending")

<form action="{{ route('admin.bookings.approve',$booking) }}" method="POST" class="d-inline">

@csrf

@method('PATCH')

<button class="btn btn-success btn-sm">

Approve

</button>

</form>

<form action="{{ route('admin.bookings.reject',$booking) }}" method="POST" class="d-inline">

@csrf

@method('PATCH')

<button class="btn btn-danger btn-sm">

Reject

</button>

</form>

@else

-

@endif

</td>

</tr>

@empty

<tr>

<td colspan="9" class="text-center">

No Bookings Found

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $bookings->links() }}

</div>

</div>

</div>

@endsection