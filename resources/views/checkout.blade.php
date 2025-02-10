@extends('layouts.app')

@section('title', 'Checkout')

@section('css')
    @vite(['resources/css/checkout.css'])
@endsection

@section('content')
<main class="checkout-container">
    <h1>Checkout</h1>
    
    <div class="checkout-content">
        <!-- Checkout Form -->
        <div class="checkout-form">
            <section class="contact-section">
                <h2>Contact</h2>
                <div class="account-prompt">
                    Have an account? <a href="#" class="create-account">Create Account</a>
                </div>
                <input type="email" name="email" placeholder="Email Address" class="full-width">
            </section>

            <section class="delivery-section">
                <h2>Delivery</h2>
                <div class="form-row">
                    <select name="country" class="full-width">
                        <option>Country / Region</option>
                    </select>
                </div>
                <div class="form-row two-columns">
                    <input type="text" name="first_name" placeholder="First Name">
                    <input type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-row">
                    <input type="text" name="address" placeholder="Address" class="full-width">
                </div>
                <div class="form-row two-columns">
                    <input type="text" name="city" placeholder="City">
                    <input type="text" name="postal_code" placeholder="Postal Code">
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="save-info">
                    <label for="save-info">Save This Info For Future</label>
                </div>
            </section>

            <section class="payment-section">
                <h2>Payment</h2>
                <div class="form-row">
                    <div class="card-select">
                        <select name="payment_method" class="full-width">
                            <option>Credit Card</option>
                        </select>
                        <img src="{{ asset('images/logos/paymenteLogos.png') }}" alt="Payment Methods" class="card-icon">
                    </div>
                </div>
                <div class="form-row">
                    <input type="text" name="card_number" placeholder="Card Number" class="full-width">
                </div>
                <div class="form-row two-columns">
                    <input type="text" name="expiration_date" placeholder="Expiration Date">
                    <input type="text" name="security_code" placeholder="Security Code">
                </div>
                <div class="form-row">
                    <input type="text" name="card_holder" placeholder="Card Holder Name" class="full-width">
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="save-payment">
                    <label for="save-payment">Save This Info For Future</label>
                </div>
            </section>

            <form method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <button type="submit" class="pay-button">Pay Now</button>
            </form>

            <footer class="checkout-footer">
                <p>Copyright © 2023 FACE. All rights reserved.</p>
            </footer>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            @foreach($cart as $item)
                <div class="order-item">
                    <div class="item-image">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                        <span class="item-count">{{ $item['quantity'] }}</span>
                    </div>
                    <div class="item-details">
                        <h3>{{ $item['name'] }}</h3>
                        <p>{{ $item['color'] ?? 'N/A' }}</p>
                    </div>
                    <div class="item-price">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                </div>
            @endforeach

            <div class="order-totals">
                <div class="subtotal">
                    <span>Subtotal</span>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="shipping">
                    <span>Shipping</span>
                    <span>${{ number_format($shipping, 2) }}</span>
                </div>
                <div class="total">
                    <span>Total</span>
                    <span>${{ number_format($subtotal + $shipping, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
