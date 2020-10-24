@extends('layouts.app')
@section('title', 'My cart')
@section('content')
    <div class="container ">
        <p class="h3 mt-5 ">My cart</p>
        @if(count($cart)<=0)
            <div class="d-flex align-item-center row">
                <div class="h4 text-center text-muted col">Your cart is empty</div>
            </div>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th class="pl-4 pr-4" scope="col"></th>
                    <th class="pl-4 pr-4" scope="col">Name</th>
                    <th class="pl-4 pr-4" scope="col">Price</th>
                    <th class="pl-4 pr-4" scope="col">Amount</th>
                    <th class="pl-4 pr-4" scope="col">Sum</th>
                    <th class="pl-4 pr-4" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $line)
                    <tr class="">
                        <td><img class="rounded img-fluid" src="{{$line->product->picture_url}}" alt="soap picture">
                        </td>
                        <td class="title pl-4">{{$line->product->name}} </td>
                        <td class="pl-4 pr-4">${{$line->product->price}}</td>
                        <td class="pl-4 pr-4">{{$line->amount}}</td>
                        <td class="pl-4 pr-4">${{$line->amount*$line->product->price}}</td>
                        <td><a class="text-danger" href="#">Delete</a></td>
                    </tr>
                @endforeach
                <tr class="">
                    <td class="text-danger h3 align-middle">Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-danger h3 align-middle">${{$sum}}</td>
                    <td><a class="btn btn-outline-danger" href="#">Buy now</a></td>
                </tr>
                </tbody>
            </table>

        @endif
    </div>
@endsection
