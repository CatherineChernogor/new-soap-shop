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
                <th class="pl-4 pr-4" scope="col">ID</th>
                <th class="pl-4 pr-4" scope="col">Date</th>
                <th class="pl-4 pr-4" scope="col">Name</th>
                <th class="pl-4 pr-4" scope="col">Price</th>
                <th class="pl-4 pr-4" scope="col">Amount</th>
                <th class="pl-4 pr-4" scope="col">Status</th>
                <th class="pl-4 pr-4" scope="col">Edit status</th>

            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                <tr class="">
                    <td class="">{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td class="title pl-4">{{$order->name}} </td>
                    <td class="pl-4 pr-4">${{$order->price}}</td>
                    <td class="pl-4 pr-4">{{$order->amount}}</td>
                    <td class="pl-4 pr-4">{{$order->status}}</td>
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" name="id" value="{{$order->id}}">
                            {{@csrf_field()}}
                            <button class="btn btn-outline-danger" type="submit">Edit status</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
