@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">

                <!-- Page Title -->
                <h5 class="card-title mb-3 d-inline">All Users</h5>

                <!-- Alerts -->
                @if (Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                @if (Session::has('delete'))
                    <p class="alert alert-info">{{ Session::get('delete') }}</p>
                @endif

                <!-- Users Table -->
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
