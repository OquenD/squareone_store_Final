<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Convert null values into empty arrays
        $product->gallery = $product->gallery ? explode(',', $product->gallery) : [];
        $product->sizes = $product->sizes ? explode(',', $product->sizes) : [];
        $product->color = $product->color ? explode(',', $product->color) : [];

        return view('product', compact('product'));
    }
}
