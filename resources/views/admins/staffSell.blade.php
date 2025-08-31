@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="staff-sell-section card p-4">
            <h2 class="text-center mb-4">Staff Sell POS</h2>

            <p>Click + or - to adjust quantity. Checkout when ready.</p>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-2 text-center mb-3">
                        <div class="product-card" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                            <img src="{{ asset('assets/images/'.$product->image) }}" class="img-fluid rounded mb-2" style="height:120px; object-fit:cover;">
                            <div>{{ $product->name }}</div>
                            <div>${{ $product->price }}</div>
                            <button type="button" class="btn btn-sm btn-success add-to-cart">+</button>
                            <button type="button" class="btn btn-sm btn-danger remove-from-cart">-</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <h4 class="mt-4">Cart</h4>
            <table class="table table-sm" id="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart items will appear here -->
                </tbody>
            </table>

            <button id="checkout" class="btn btn-sm btn-primary">Checkout</button>
        </section>
    </div>
</div>

<script>
let cart = {}; // store cart items

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.product-card');
        const id = card.dataset.id;
        const name = card.dataset.name;
        const price = parseFloat(card.dataset.price);

        if(cart[id]) {
            cart[id].quantity++;
        } else {
            cart[id] = { name, price, quantity: 1 };
        }

        renderCart();
    });
});

document.querySelectorAll('.remove-from-cart').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.product-card');
        const id = card.dataset.id;

        if(cart[id]) {
            cart[id].quantity--;
            if(cart[id].quantity <= 0) delete cart[id];
        }

        renderCart();
    });
});

function renderCart() {
    const tbody = document.querySelector('#cart-table tbody');
    tbody.innerHTML = '';
    Object.keys(cart).forEach(id => {
        const item = cart[id];
        tbody.innerHTML += `<tr>
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td>$${(item.price * item.quantity).toFixed(2)}</td>
        </tr>`;
    });
}

// Handle checkout
document.querySelector('#checkout').addEventListener('click', function() {
    for(const id in cart) {
        const item = cart[id];
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('staff.sell') }}";
        form.innerHTML = `@csrf
            <input type="hidden" name="product_id" value="${id}">
            <input type="hidden" name="quantity" value="${item.quantity}">
            <input type="hidden" name="payment_status" value="Due">
            <input type="hidden" name="first_name" value="Staff">
            <input type="hidden" name="last_name" value="">
            <input type="hidden" name="state" value="">`;
        document.body.appendChild(form);
        form.submit();
    }
});
</script>
@endsection
