@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">My Orders</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="index.html">Home</a></span> <span>My Orders</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table-dark" style="width:1100px">
                        <thead style="background-color:#c49b63; height:60px">
                            <tr class="text-center">
                                <th>Fisrt Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Price</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($orders->count() > 0)
                                @foreach($orders as $order)
                                    <tr class="text-center" style="height:140px">
                                        <td class="product-remove">
                                            {{ $order->first_name}}
                                        </td>
                                        <td class="image-prod">
                                            {{ $order->last_name}} </td>
                                        <td class="product-name">
                                            <h3>{{ $order->address }}</h3>
                                        </td>
                                        <td class="price">
                                            {{ $order->city }}
                                        </td>
                                        <td >
                                            {{ $order->email }}
                                        </td>
                                        <td class="total">${{ $order->price }}</td>
                                        <td class="total">${{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="alert alert-success">you have no order just yet</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-end">
            <div class="col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>${{ $totalPrice }}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>${{ $totalPrice }}</span>
                    </p>
                </div>

                @if ($cart->count() > 0)
                    <form method="POST" action="{{ route('prepare.checkout') }}">
                        @csrf
                        <input name="price" type="hidden" value="{{ $totalPrice }}">
                        <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                    </form>
                @else
                    <p class="text-center alert alert-success">You cannot checkout because your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
</section> --}}
{{-- <table class="table"> --}}
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>

@endsection