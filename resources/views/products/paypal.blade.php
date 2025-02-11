@extends('layouts.app')

@section('content')

<div class="container">
    <script src="https://www.paypal.com/sdk/js?client-id=Af9OaayCRet5BCAneitISzmsz_FdvQqMPiBO3m8IIwgxgA7DmLQNXnwkP9z2KxJp9ZlBLVNMTz6w_W4T&currency=USD"></script>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            createOrder:(data,action)=>{
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value:'300'
                        }
                    }]
                    });
            },
            onApprove:(data,action)=>{
                return actions.order.capture().then(function(orderData){
                    window.location.href='index.php';
                });
            }
        }).render('#paypal-button-container');

        </script>
</div>

@endsection