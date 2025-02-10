@extends('layouts.app')

@section('title', $product->name)

@section('css')
    @vite(['resources/css/product_page.css'])
@endsection

@section('content')
<main class="product-container">
    <!-- Thumbnail Gallery -->
    <div class="thumbnail-gallery">
    @if(!empty($product->gallery))
        @foreach($product->gallery as $image)
            <img src="{{ asset($image) }}" alt="Product view" class="thumbnail">
        @endforeach
    @else
        <p>No images available</p>
    @endif
</div>

    <!-- Main Product Image -->
    <div class="main-image-container">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="main-image">
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <p class="brand">{{ $product->brand }}</p>
        <h1 class="product-title">{{ $product->name }}</h1>
        
        <div class="rating">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $product->rating)
                    <i class="fas fa-star star"></i>
                @else
                    <i class="far fa-star star"></i>
                @endif
            @endfor
            <span>({{ $product->reviews_count }})</span>
        </div>

        <div class="price-container">
            <span class="current-price">${{ $product->discount_price ?? $product->price }}</span>
            @if($product->discount_price)
                <span class="original-price">${{ $product->price }}</span>
                <span class="discount-badge">SAVE {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%</span>
            @endif
        </div>

        <p class="viewers">{{ $product->viewers }} people are viewing this right now</p>

        <div class="sale-timer">
            <p class="timer-title">Hurry up! Sale ends in:</p>
            <div class="timer-display">
                <span class="timer-unit">00</span> :
                <span class="timer-unit">05</span> :
                <span class="timer-unit">59</span> :
                <span class="timer-unit">47</span>
            </div>
        </div>

        <div class="stock-info">
            <p>Only {{ $product->stock }} item(s) left in stock!</p>
            <div class="progress-bar">
                <div class="progress" 
                    style="width: {{ $product->initial_stock > 0 ? ($product->stock / $product->initial_stock) * 100 : 0 }}%;">
                </div>
            </div>
        </div>

        <!-- Size Selection -->
        <div class="size-section">
            <p>Size:</p>
            <div class="size-options">
                @if(!empty($product->sizes))
                    @foreach($product->sizes as $size)
                        <span class="size-option">{{ $size }}</span>
                    @endforeach
                @else
                    <p>No sizes available</p>
                @endif
            </div>
        </div>

        <!-- Color Selection -->
        <div class="color-section">
            <p>Color:</p>
            <div class="color-options">
                @if(!empty($product->color))
                    @foreach($product->color as $color)
                        <div class="color-option" style="background-color: {{ $color }};"></div>
                    @endforeach
                @else
                    <p>No colors available</p>
                @endif
            </div>
        </div>

        <!-- Quantity Selector -->
        <div class="quantity-section">
            <div class="quantity-controls">
                <button class="quantity-btn">-</button>
                <input type="number" value="1" class="quantity-input">
                <button class="quantity-btn">+</button>
            </div>
            <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart">Add to cart</a>
        </div>

        <!-- Additional Info -->
        <div class="additional-info">
            <button class="info-button">
                <i class="fas fa-exchange-alt"></i>
                Compare
            </button>
            <button class="info-button">
                <i class="far fa-question-circle"></i>
                Ask a question
            </button>
            <button class="info-button">
                <i class="fas fa-share-alt"></i>
                Share
            </button>
        </div>

        <!-- Shipping Info -->
        <div class="shipping-info">
            <div class="info-item">
                <i class="fas fa-truck"></i>
                <span>Estimated Delivery: {{ now()->addDays(5)->format('M d') }} - {{ now()->addDays(10)->format('M d') }}</span>
            </div>
            <div class="info-item">
                <i class="fas fa-gift"></i>
                <span>Free Shipping & Returns: On all orders over $75</span>
            </div>
            <p>Guarantee safe & secure checkout</p>
            <div class="payment-methods">
                <img src="{{ asset('images/logos/trustbag.png') }}" alt="Visa" class="payment-icon">
            </div>
        </div>
    </div>
</main>
@endsection
