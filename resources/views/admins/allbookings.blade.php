@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        @if (Session::has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Bookings</h5>
                <a href="{{ route('create.bookings') }}" class="btn btn-primary mb-4 float-end">Create Booking</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Chang status</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $booking->id }}</th>
                                <td>{{ $booking->first_name }}</td>
                                <td>{{ $booking->last_name }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->message }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="{{ route('edit.bookings', $booking->id) }}" class="btn btn-sm btn-warning">Change Status</a>
                                </td>

                                <td>{{ $booking->created_at }}</td>
                               <td>
                            <form action="{{ route('delete.bookings', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection