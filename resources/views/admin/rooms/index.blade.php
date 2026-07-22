@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h2>Room Management</h2>

        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Room
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <form method="GET" class="mb-3">

        <div class="input-group">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search Room..."
                value="{{ request('search') }}">

            <button class="btn btn-dark">

                Search

            </button>

        </div>

    </form>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Image</th>

                        <th>Room No.</th>

                        <th>Type</th>

                        <th>Capacity</th>

                        <th>Price</th>

                        <th>Status</th>

                        <th width="220">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($rooms as $room)

                    <tr>

                        <td width="120">

                            @if($room->image)

                                <img
                                    src="{{ asset('uploads/rooms/'.$room->image) }}"
                                    width="100">

                            @endif

                        </td>

                        <td>{{ $room->room_number }}</td>

                        <td>{{ $room->room_type }}</td>

                        <td>{{ $room->capacity }}</td>

                        <td>₱{{ number_format($room->price,2) }}</td>

                        <td>

                            <span class="badge bg-success">

                                {{ $room->status }}

                            </span>

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.rooms.show',$room) }}"
                                class="btn btn-info btn-sm">

                                View

                            </a>

                            <a
                                href="{{ route('admin.rooms.edit',$room) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.rooms.destroy',$room) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this room?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No Rooms Found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $rooms->links() }}

        </div>

    </div>

</div>

@endsection