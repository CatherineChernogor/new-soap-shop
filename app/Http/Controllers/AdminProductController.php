<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    public function create(Request $request)
    {
        if ($this->store($request)) {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->picture_url = $request->picture_url;
            $product->content = $request->content;

            $product->save();

            return redirect(route('admin_products'))->with('product_message', 'Product has been created');
        }
    }

    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'picture_url' => 'required|url',
            'content' => 'required',
        ]);

        return true;
    }

    public function delete(Request $request)
    {
        $order = Product::find($request->id);
        $order->delete();//make on cascade
        return redirect(route('admin_products'));
    }
}
