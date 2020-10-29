@extends('layouts.app')
@section('title', 'My cart')
@section('content')
    <div class="container ">
        <p class="h3 mt-5 ">My cart</p>





        @if(session()->has('del_from_cart_message'))
            <div class="alert alert-success">{{session()->get('del_from_cart_message')}}</div>
        @endif
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
                        <td><img class="rounded img-fluid" src="{{$line->picture_url}}" alt="soap picture">
                        </td>
                        <td class="title pl-4">{{$line->name}} </td>
                        <td class="pl-4 pr-4">${{$line->price}}</td>
                        <td class="pl-4 pr-4">{{$line->amount}}</td>
                        <td class="pl-4 pr-4">${{$line->amount*$line->price}}</td>
                        <td>
                            <form action="{{route('delete_order')}}" method="post">
                                <input type="hidden" name="id" value="{{$line->id}}">
                                {{csrf_field()}}
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="">
                    <td class="text-danger h3 align-middle">Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-danger h3 align-middle">${{$sum}}</td>
                    <td><a class="btn btn-warning" href="{{route('buy')}}">Buy now</a></td>
                </tr>
                </tbody>
            </table>

        @endif
    </div>
@endsection
