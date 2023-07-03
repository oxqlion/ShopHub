{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
</head>

<body>
    <p>Name : {{ $product->name }}</p>
    <p>Description : {{ $product->description }}</p>
    <p>Price : Rp{{ $product->price }}</p>
    <p>Stock : {{ $product->stock }}</p>
    <img src="{{ url('/storage/' . $product->image) }}" height="100px" alt=""> <br>
    <a href="{{ route('indexProduct') }}">Back</a>
    <form action="{{ route('editProduct', $product) }}" method="get">
        @csrf
        <button type="submit">Edit Product</button>
    </form>
    <form action="{{ route('addToCart', $product) }}" method="post">
        @csrf
        <input type="number" name="amount" value=1>
        <button type="submit">Add To Cart</button>
    </form>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>Error : {{ $error }}</p>
        @endforeach
    @endif
</body>

</html> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Detail') }}</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <img src="{{ url('storage/' . $product->image) }}" width="200px" alt="">
                            </div>
                            <div class="">
                                <h1>{{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3>Rp{{ $product->price }}</h3>
                                <hr>
                                <p>{{ $product->stock }} left</p>
                                @if (Auth::user())
                                    @if (!Auth::user()->is_admin)
                                        <form action="{{ route('addToCart', $product) }}" method="post">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" name="amount" class="form-control"
                                                    aria-describedby="basic-addon2" value=1>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary">Add To
                                                        Cart</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('editProduct', $product) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Edit Product</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>Error : {{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
