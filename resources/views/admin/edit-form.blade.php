@extends('layouts.app')
@section('title', 'Admin - edit product')
@section('content')
    <div class="container ">

        <p class="h4 mt-5 ">Edit product</p>

        @if ($errors->any())
            <div class="alert alert-danger">You have errors to fix</div>
        @endif

        <form action="{{route('edit_product')}}" method="post">

            <div class="form-group">
                <label>Product's name</label>
                <input type="text" class="form-control" name="name" placeholder="Soap №345" value="{{@old('name') ?? $product->name}}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's price</label>
                <input type="text" class="form-control" name="price" placeholder="32434" value="{{@old('price') ?? $product->price}}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's picture url</label>
                <input type="text" class="form-control" name="picture_url" value="{{@old('picture_url') ?? $product->picture_url}}"
                       placeholder="https://source.unsplash.com/1600x900/?soap,handmade">
                @error('picture_url')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product's content</label>
                <textarea class="form-control" type="text" name="content" value=""
                          placeholder="Lorem ipsum dolor sit amet...">{{@old('content') ?? $product->content}}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{@csrf_field()}}
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
