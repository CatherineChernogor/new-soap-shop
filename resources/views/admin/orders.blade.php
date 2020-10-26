@extends('layouts.app')
@section('title', 'Admin - orders')
@section('content')
    <div class="container ">
        <p class="h3 mt-5 ">Admin - orders</p>

        <!-- Products table -->
        <p class="h4 mt-5 ">All orders</p>

        <table class="table">
            <thead>
            <tr>
                <th class="pl-4 pr-4" scope="col">UUID</th>
                <th class="pl-4 pr-4" scope="col">Date</th>
                <th class="pl-4 pr-4" scope="col">User_id</th>
                <th class="pl-4 pr-4" scope="col">Name</th>
                <th class="pl-4 pr-4" scope="col">Price</th>
                <th class="pl-4 pr-4" scope="col">Amount</th>
                <th class="pl-4 pr-4" scope="col">Status</th>

            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)

                <tr class="">
                    <td>{{$order->uuid}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->user_id}}</td>
                    <td class="title pl-4">{{$order->product->name}} </td>
                    <td class="pl-4 pr-4">${{$order->product->price}}</td>
                    <td class="pl-4 pr-4">{{$order->amount}}</td>
                    <td class="pl-4 pr-4">{{$order->status}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
