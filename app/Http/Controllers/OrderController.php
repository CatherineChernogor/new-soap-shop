<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('cart', ['cart' => $user->orders, 'sum' => $this->countSum($user->orders)]);
    }

    public function countSum($cart)
    {
        $total = 0;
        foreach ($cart as $line) {
            $total += $line->amount * $line->product->price;
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

        return redirect(route('products'));
    }

    public function delete(Request $request){
        $order = Order::find($request->id);
        $order->delete();
        return redirect(route('cart'));
    }
}
