@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-6 mt-5">
                <img src="{{$product->picture_url}}" class="w-100 img-fluid" alt="soap picture">
            </div>
            <div class="col-6 mt-5">
                <p class="h2 text-capitalize">{{$product->name}} </p>
                <p class="h3">${{$product->price}}</p>

                <form action="{{route('add_order')}}" method="post">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="group-form w-75 row pl-3">
                        <input class="form-control w-25" id="roinp" type="number" name="amount" value=""
                               placeholder="0"
                               readonly>
                        <button class="btn btn-outline-primary rounded-pill ml-2" type="button"
                                onclick="
                                let e = document.getElementById('roinp');
                                e.value = Number(e.value)+1"
                        >+
                        </button>
                        <button class="btn btn-outline-primary rounded-pill ml-2" type="button"
                                onclick="
                                let e = document.getElementById('roinp');
                                e.value > 0? e.value = Number(e.value)-1: 0;"
                        >-
                        </button>
                        <button class="btn btn-outline-primary ml-4" type="submit">Add to cart</button>
                    </div>
                    {{@csrf_field()}}

                </form>
                <p class="mt-4">{{$product->content}}</p>
            </div>
        </div>
    </div>
@endsection
