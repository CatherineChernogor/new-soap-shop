<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function show()
    {
        $products = Product::all();

        return view('home', [
            'products' => $products
        ]);
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->picture_url = $request->picture_url;
        $product->content = $request->content;

        $product->save();

        return redirect('/');
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        return //$product->name;
            view('single-product', ['product' => $product]);
    }

}
