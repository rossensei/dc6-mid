<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return inertia('Product/Index', [
            'products' => Product::orderBy('brand')
                ->get()
                ->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'brand' => $product->brand,
                        'name' => $product->name,
                        'description' => $product->description,
                        'retail_price' => $product->retail_price,
                        'qty_stock' => $product->qty_stock,
                        'category' => $product->category->name,
                        'thumbnail' => $product->thumbnail,
                    ];
                })
                
        ]);
    }

    public function create()
    {
        return inertia('Product/Create');
    }
}
