@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>Add Room</h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.rooms.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Room Number</label>

                        <input
                            type="text"
                            name="room_number"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Room Type</label>

                        <select
                            name="room_type"
                            class="form-control">

                            <option>Standard</option>
                            <option>Deluxe</option>
                            <option>Suite</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Capacity</label>

                        <input
                            type="number"
                            name="capacity"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Description</label>

                        <textarea
                            name="description"
                            class="form-control"></textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option>Available</option>
                            <option>Occupied</option>
                            <option>Maintenance</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Room Image</label>

                        <input
                            type="file"
                            name="image"
                            class="form-control">

                    </div>

                </div>

                <button class="btn btn-success">

                    Save Room

                </button>

            </form>

        </div>

    </div>

</div>

@endsection