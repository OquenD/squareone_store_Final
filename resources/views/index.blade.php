@extends('layouts.app')
@section('css')
    @vite(['resources/css/home.css'])
@endsection
@section('title', 'SQUARED - Fashion Store')

@section('content')
<section class="hero">
    <div class="hero-content">
        <div class="hero-image">
            <img src="{{ asset('images/products/hero_image.png') }}" alt="heroImage" class="hero-image">
        </div>
        <div class="hero-paragraph">
            <h2 class="hero-title">Hot! Quick Deal Week</h2>
            <h1 class="hero-subtitle">SALE UP 50% <br> MODERN FURNITURE</h1>
            <button class="hero-button">View now</button>
        </div>
    </div>
</section>

<section class="brands">
    <img src="{{ asset('images/logos/chanel.png') }}" alt="Chanel" class="brand-logo">
    <img src="{{ asset('images/logos/louis.png') }}" alt="Louis Vuitton" class="brand-logo">
    <img src="{{ asset('images/logos/prada.png') }}" alt="Prada" class="brand-logo">
    <img src="{{ asset('images/logos/calvin.png') }}" alt="Calvin Klein" class="brand-logo">
    <img src="{{ asset('images/logos/denim.png') }}" alt="Denim" class="brand-logo">
</section>

<section class="new-arrivals">
    <h2 class="section-title">New Arrivals</h2>
    <p class="section-subtitle">Discover our exciting new arrivals, featuring the latest trends and styles to refresh your wardrobe this season.</p>
    
    <div class="category-nav">
        <button class="category-button">Men's Fashion</button>
        <button class="category-button active">Women's Fashion</button>
        <button class="category-button">Women Accessories</button>
        <button class="category-button">Men Accessories</button>
        <button class="category-button">Discount Deals</button>
    </div>
    
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                <h3 class="product-title">{{ $product->name }}</h3>
                <h4 class="product-brand">{{ $product->brand }}</h4>
                <div class="price-container">
                    <span class="current-price">${{ $product->discount_price ?? $product->price }}</span>
                    @if($product->discount_price)
                        <span class="original-price">${{ $product->price }}</span>
                    @endif
                </div>
                <a href="{{ route('shop') }}">
                    <button class="buy-button">Comprar</button>
                </a>
            </div>
        @endforeach
    </div>
    <button class="hero-button">View More</button>
</section>

<section class="summer-sale">
    <div class="summer-sale-content">
        <h2 class="summer-sale-title">Extra 50% Off Online</h2>
        <h1 class="summer-sale-subtitle">Summer Season Sale</h1>
        <p class="summer-sale-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel dolor pellentesque, varius elit quis, malesuada quam.</p>
        <button class="summer-sale-hero-button">Shop Now</button>
    </div>
</section>

<section class="features">
    <div class="feature">
        <img src="{{ asset('images/logos/quality.png') }}">
    </div>
    <div class="feature">
        <img src="{{ asset('images/logos/warranty.png') }}">
    </div>
    <div class="feature">
        <img src="{{ asset('images/logos/shipping.png') }}">
    </div>
    <div class="feature">
        <img src="{{ asset('images/logos/support.png') }}">
    </div>
</section>

<footer>
    <div class="footer_content">
        <div class="logo">
            <img src="{{ asset('images/logos/SQ1_Academy.svg') }}" alt="logo">
        </div>
        <ul>
            <li><a href="#">Support Center</a></li>
            <li><a href="#">Invoicing</a></li>
            <li><a href="#">Contract</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
    </div>
</footer>

@endsection
