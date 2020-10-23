@extends('layouts.app')
@section('title', 'Home - Catalog')
@section('content')
    <div class="container">
        <p class="h3 mt-5">Home catalog</p>
        <div class="row mt-5 justify-content-center">

                @foreach($products as $product )

                    <div class="card" style="width: 18rem;">
                        <img src="{{$product->picture_url}}" class="card-img-top" alt="soap picture">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}} </h5>
                            <p class="">${{$product->price}}</p>
                            <p class="card-text">{{substr($product->content, 0, 50)}}...</p>
                            <a href="{{route('single_product', ['id' => $product->id])}}" class="btn btn-primary">View</a>
                        </div>
                    </div>

                @endforeach
        </div>
    </div>
@endsection
