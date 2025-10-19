@extends('layouts.admin')

@section('content')
<div class="container mt-5 text-center">
    <h2>Scan QR to Pay</h2>
    <p>Total: ${{ number_format($total, 2) }}</p>

    <div class="my-4">
        {!! QrCode::size(250)->generate($paymentString) !!}
    </div>

    <p>Scan this QR code with your ABA or e-Money app to complete the payment.</p>
</div>
@endsection
