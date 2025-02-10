@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('css')
    @vite(['resources/css/cart_page.css'])
@endsection

@section('content')
<main class="main-content">
    <div class="container">
        <h1>Shopping Cart</h1>
        
        <div class="breadcrumb">
            <a href="{{ route('index') }}">Home</a> > Your Shopping Cart
        </div>

        <div class="cart-container">
            <div class="cart-header">
                <div class="product-col">Product</div>
                <div class="price-col">Price</div>
                <div class="quantity-col">Quantity</div>
                <div class="total-col">Total</div>
            </div>

            @forelse($cart as $item)
                <div class="cart-item">
                    <div class="product-col">
                        <div class="product-info">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                            <div class="product-details">
                                <h3>{{ $item['name'] }}</h3>
                                <p>Color: {{ $item['color'] ?? 'N/A' }}</p>
                                <a href="{{ route('cart.remove', $item['id']) }}" class="remove-link">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="price-col">${{ number_format($item['price'], 2) }}</div>
                    <div class="quantity-col">
                        <div class="quantity-control">
                            <a href="{{ route('cart.decrease', $item['id']) }}" class="minus">-</a>
                            <input type="text" value="{{ $item['quantity'] }}" readonly>
                            <a href="{{ route('cart.increase', $item['id']) }}" class="plus">+</a>
                        </div>
                    </div>
                    <div class="total-col">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse

            @if($cart)
                <div class="gift-wrap">
                    <label>
                        <input type="checkbox">
                        For $10.00 Please Wrap The Product
                    </label>
                </div>

                <div class="cart-summary">
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span class="amount">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
                    <a href="{{ route('shop') }}" class="view-cart">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
