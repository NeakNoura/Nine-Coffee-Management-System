@extends('layouts.app')

@section('content')
<style>
.form-control {
  border: 1px solid #ced4da !important;
  border-radius: .25rem !important;
  background-color: #fff !important;
}
</style>
<div class="container mt-5 pt-5">
     @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border border-primary rounded-3">
                <div class="card-header bg-primary text-white text-center">
                   <a href="{{ route('create.bookings') }}" class="btn btn-primary float-end">
    Create Booking
</a>

                </div>
                <div class="card-body p-4">

                    {{-- Success message --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('store.bookings') }}" method="POST">


                        @php
                            $inputClass = 'form-control border border-dark text-dark';
                        @endphp

                        {{-- First Name --}}
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text"
                                   class="{{ $inputClass }} @error('first_name') is-invalid @enderror"
                                   id="first_name" name="first_name" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text"
                                   class="{{ $inputClass }} @error('last_name') is-invalid @enderror"
                                   id="last_name" name="last_name" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date --}}
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date"
                                   class="{{ $inputClass }} @error('date') is-invalid @enderror"
                                   id="date" name="date" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Time --}}
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time"
                                   class="{{ $inputClass }} @error('time') is-invalid @enderror"
                                   id="time" name="time" required>
                            @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text"
                                   class="{{ $inputClass }} @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="{{ $inputClass }} @error('message') is-invalid @enderror"
                                      id="message" name="message" rows="3"></textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Booking</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
