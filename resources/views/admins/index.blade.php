@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                    <p class="card-text">number of products:{{$productsCount}}</p>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                    <p class="card-text">number of orders:{{$ordersCount}}</p>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bookings</h5>
                    <p class="card-text">number of products:{{$bookingsCount}}</p>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                    <p class="card-text">number of products:{{$adminsCount}}</p>
                </div>
        </div>
    </div>
    
@endsection