<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminOrderController extends Controller
{
    public function show()
    {
        $orders = Application::all();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function editStatus()
    {

    }

    public function buy(Request $request)
    {
        $orders = Order::all()->where('user_id', $request->user()->id);
        $uuid = Str::uuid();
        foreach ($orders as $order) {
            //dd($order);
            $application = new Application();
            $application->product_id = $order->product_id;
            $application->amount = $order->amount;
            $application->user_id = $order->user_id;
            $application->status = 'recived';
            $application->uuid = $uuid;

            $application->save();
            Order::find($order->id)->delete();
        }

        return redirect()->route('products')->with('buy_message', 'You successfully purchased all items');
    }
}
