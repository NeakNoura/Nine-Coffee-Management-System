@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Pay with Paypal</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- ✅ FIXED: Ensure you have a valid Google API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_VALID_API_KEY"></script>

    <!-- ✅ FIXED: PayPal SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AQOsuWjUUGTN2IipP8kbdp_jaYyWdOAFbP4yD5oBAc62GVe4F7xnkjy8SYNpF8Kd6VMOA5ODFWVSZ_vA&currency=USD"></script>

    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            createOrder: (data, actions) => {  // ✅ Fixed parameter name
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{Session::get('price')}}'
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {  // ✅ Fixed parameter name
                return actions.order.capture().then(function(orderData) {
                    window.location.href = 'http://127.0.0.1:8000/products/success';  // ✅ Fixed redirection
                });
            }
        }).render('#paypal-button-container');
    </script>
</div>

@endsection
