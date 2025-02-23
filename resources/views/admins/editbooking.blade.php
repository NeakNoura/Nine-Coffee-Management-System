@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Booking</h5>

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('update.bookings', $booking->id) }}" method="POST">
                    @csrf            
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                       <select name="status" class="form-select form-control" aria-label="">
                        <option selected>Choose Status</option>
                        <option value="Proccessing">Proccessing</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Pending">Pending</option>
                    </select>
                         
                    </div>
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                    <a href="{{ route('all.bookings') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
