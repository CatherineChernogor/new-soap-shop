<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Order;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class OrderController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $orders_p = $user->orders->load('product');
        //dd($orders[1]->where('relation', null)); // check relations

        $products = [];
        foreach ($orders_p as $key => $order) {
            $product = Product::find($order->product_id);

            if (!empty($product)) {
                $product['amount'] = $order->amount;
                array_push($products, $product);
            }
        }
        return view('cart', ['cart' => $products, 'sum' => $this->countSum($products)]);
    }

    public function countSum($cart)
    {
        $total = 0;
        foreach ($cart as $line) {
            $total += $line->amount * $line->price;
        }
        return $total;
    }

    public function add(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->product_id = $request->product_id;
        $order->amount = $request->amount;

        $order->save();

        return redirect()->route('products')->with('add_to_cart_message', 'Successfully added to cart');
    }

    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();
        return redirect()->route('cart')->with('del_from_cart_message', 'Successfully deleted from cart');
    }

}
