@extends('layouts.app')

@section('title', 'Search Results')
@section('css')
    @vite(['resources/css/auth.css'])
@endsection

@section('content')
<h1>Search Results for "{{ $query }}"</h1>

@if($products->isEmpty())
    <p>No products found.</p>
@else
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('product.show', $product->id) }}" class="buy-button">View Product</a>
            </div>
        @endforeach
    </div>
@endif
@endsection
