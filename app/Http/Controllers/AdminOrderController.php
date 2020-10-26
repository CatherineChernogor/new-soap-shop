<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function show()
    {
        $orders = Application::all();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function editStatus(){

    }
}
