@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-xl justify-content-center">

            <div class="col">
                <img src="{{$product->picture_url}}" class="w-100" alt="soap picture">
            </div>
            <div class="col">
                <p class="h2">{{$product->name}} </p>
                <p class="h3">${{$product->price}}</p>
                <form action="" method="post">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="number" name="amount" placeholder="0"><br>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </form>
                <p class="">{{$product->content}}</p>
            </div>
        </div>
    </div>
@endsection
