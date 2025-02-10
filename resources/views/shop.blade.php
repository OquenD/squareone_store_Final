@extends('layouts.app')

@section('title', 'Shop')

@section('css')
    @vite(['resources/css/shop_page.css'])
@endsection

@section('content')
<main class="main-content">
    <!-- Sidebar Filters -->
    <aside class="filters">
        <div class="filter-section">
            <h3 class="filter-title">Filters</h3>
        </div>

        <!-- Size Filter -->
        <div class="filter-section">
            <h3 class="filter-title">Size</h3>
            <div class="size-options">
                <a href="{{ request()->fullUrlWithQuery(['size' => 'XS']) }}" class="size-option">XS</a>
                <a href="{{ request()->fullUrlWithQuery(['size' => 'S']) }}" class="size-option">S</a>
                <a href="{{ request()->fullUrlWithQuery(['size' => 'M']) }}" class="size-option">M</a>
            </div>
        </div>

        <!-- Color Filter -->
        <div class="filter-section">
            <h3 class="filter-title">Colors</h3>
            <div class="color-options">
                @foreach(['#FF6C6C', '#FF7629', '#FFF06C', '#9BFF6C', '#6CFF9E', '#6CFFDC', '#6CB9FF', '#6CF6FF', '#6CA7FF', '#6C7BFF', '#8A6CFF', '#B66CFF', '#FC6CFF', '#FF6C6C'] as $color)
                    <a href="{{ request()->fullUrlWithQuery(['color' => $color]) }}" class="color-option" style="background-color: {{ $color }};"></a>
                @endforeach
            </div>
        </div>

        <!-- Price Filter -->
        <div class="filter-section">
            <h3 class="filter-title">Prices</h3>
            <ul class="price-range">
                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 0, 'max_price' => 50]) }}">$0.00 - $50.00</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 50, 'max_price' => 100]) }}">$50.00 - $100.00</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 100, 'max_price' => 150]) }}">$100.00 - $150.00</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 150, 'max_price' => 200]) }}">$150.00 - $200.00</a></li>
            </ul>
        </div>

        <!-- Brands Filter -->
        <div class="filter-section">
            <h3 class="filter-title">Brands</h3>
            <ul class="filter-list">
                <li><a href="{{ request()->fullUrlWithQuery(['brand' => 'Nike']) }}">Nike <span>(23)</span></a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['brand' => 'Adidas']) }}">Adidas <span>(18)</span></a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['brand' => 'Puma']) }}">Puma <span>(15)</span></a></li>
            </ul>
        </div>

        <!-- Tags -->
        <div class="filter-section">
            <h3 class="filter-title">Tags</h3>
            <div class="tags">
                <a href="{{ request()->fullUrlWithQuery(['tag' => 'Fashion']) }}" class="tag">Fashion</a>
                <a href="{{ request()->fullUrlWithQuery(['tag' => 'Style']) }}" class="tag">Style</a>
                <a href="{{ request()->fullUrlWithQuery(['tag' => 'Casual']) }}" class="tag">Casual</a>
                <a href="{{ request()->fullUrlWithQuery(['tag' => 'Classic']) }}" class="tag">Classic</a>
            </div>
        </div>
    </aside>

    <!-- Product Section -->
    <section class="products-section">
        <div class="product-grid-header">
            <h3 class="product-grid-header-title">Best Selling</h3>
            <div class="view-options">
                <div class="view-option"><i class="fas fa-th-large"></i></div>
                <div class="view-option"><i class="fas fa-list"></i></div>
            </div>
        </div>

        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <div class="price">${{ $product->price }}</div>
                    <div class="color-variants">
                        @foreach(explode(',', $product->color) as $color)
                            <div class="color-variant" style="background-color: {{ $color }};"></div>
                        @endforeach
                    </div>
                    <a href="{{ route('product.show', $product->id) }}" class="buy-button">View Product</a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </section>
</main>
@endsection
