<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // **Filter by Category**
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // **Filter by Size**
        if ($request->filled('size')) {
            $query->where('size', 'LIKE', '%' . $request->size . '%');
        }

        // **Filter by Color**
        if ($request->filled('color')) {
            $query->where('color', 'LIKE', '%' . $request->color . '%');
        }

        // **Filter by Price Range**
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // **Filter by Brand**
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // **Filter by Tag**
        if ($request->filled('tag')) {
            $query->where('tags', 'LIKE', '%' . $request->tag . '%');
        }

        $products = $query->paginate(9);

        return view('shop', compact('products'));
    }
}