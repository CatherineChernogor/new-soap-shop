<?php

namespace App\Http\Controllers;

use App\Models\User;
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

}
