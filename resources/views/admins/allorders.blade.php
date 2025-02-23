@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    @if (Session::has('update'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                        {{ Session::get('update') }}                
                    </p>
                @endif                                
                                @if (Session::has('delete'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                        {{ Session::get('delete') }}                
                    </p>
                @endif
                </div>
                    <h5 class="card-title mb-3 d-inline">Orders</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Street Address</th>
                            <th scope="col">Total Price</th>                                       
                            <th scope="col">Status</th>
                            <th scope="col">Change Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allOrders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>${{ $order->address }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('edit.orders', $order->id) }}" class="btn btn-warning text-center">Change Status</a>
                            </td>   
                            <td>                                
                                <form action="{{ route('delete.orders', $order->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-center" onclick="return confirm('Are you sure?')">Delete</button>
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
</div>
@endsection
