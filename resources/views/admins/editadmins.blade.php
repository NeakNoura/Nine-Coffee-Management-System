@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-primary rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Admin</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.admins') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $admin->id }}">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Leave blank to keep old password" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Update Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
