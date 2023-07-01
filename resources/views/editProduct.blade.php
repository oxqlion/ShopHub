{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product : {{ $product->name }}</h1>
    <form action="{{ route('updateProduct', $product) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <label for="name">Name</label> <br>
        <input type="text" name="name" value="{{ $product->name }}"> <br>
        <label for="description">Description</label> <br>
        <input type="text" name="description" value="{{ $product->description }}"> <br>
        <label for="rrice">Price</label> <br>
        <input type="number" name="price" value="{{ $product->price }}"> <br>
        <label for="stock">Stock</label> <br>
        <input type="number" name="stock" value="{{ $product->stock }}"> <br>
        <input type="file" name="image"> <br>
        <button type="submit">Update Data</button>
    </form>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>
                    <div class="card-body">
                        <form action="{{ route('updateProduct', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
