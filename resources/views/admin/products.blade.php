@extends('layouts.app')
@section('title', 'Admin - products')
@section('content')
    <div class="container ">
        <p class="h3 mt-5 ">Admin - products</p>
        @if(session()->has('product_message'))
            <div class="alert alert-success">{{session()->get('product_message')}}</div>
        @endif
        <!-- Add product to Products -->
        <p class="h4 mt-5 ">Add product</p>

        @if ($errors->any())
            <div class="alert alert-danger">You have errors to fix</div>
        @endif


        <form action="{{route('create_product')}}" method="post">
            <div class="form-group">
                <label>Product's name</label>
                <input type="text" class="form-control" name="name" placeholder="Soap №345" value="{{@old('name')}}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's price</label>
                <input type="text" class="form-control" name="price" placeholder="32434" value="{{@old('price')}}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's picture url</label>
                <input type="text" class="form-control" name="picture_url" value="{{@old('picture_url')}}"
                       placeholder="https://source.unsplash.com/1600x900/?soap,handmade">
                @error('picture_url')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's content</label>
                <textarea class="form-control" type="text" name="content" value="{{@old('content')}}"
                          placeholder="Lorem ipsum dolor sit amet..."></textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{@csrf_field()}}
            <button type="submit" class="btn btn-primary">Send</button>
        </form>


        <!-- Products table -->
        <p class="h4 mt-5 ">All products</p>

        <table class="table">
            <thead>
            <tr>
                <th class="pl-4 pr-4" scope="col">ID</th>
                <th class="pl-4 pr-4" scope="col">Picture</th>
                <th class="pl-4 pr-4" scope="col">Name</th>
                <th class="pl-4 pr-4" scope="col">Price</th>
                <th class="pl-4 pr-4" scope="col">Content</th>
                <th class="pl-4 pr-4" scope="col"></th>
                <th class="pl-4 pr-4" scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr class="">
                    <td class="">{{$product->id}}</td>
                    <td>
                        <img class="rounded img-fluid" src="{{$product->picture_url}}" alt="soap picture">
                    </td>
                    <td class="title pl-4">{{$product->name}} </td>
                    <td class="pl-4 pr-4">${{$product->price}}</td>
                    <td class="pl-4 pr-4">{{$product->content}}</td>
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            {{@csrf_field()}}
                            <button class="btn btn-outline-danger" type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('delete_product')}}" method="post">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            {{@csrf_field()}}
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
