<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        return view('single-product', ['product' => $product]);
    }

}
