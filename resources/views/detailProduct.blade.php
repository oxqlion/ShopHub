<!DOCTYPE html>
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

</html>
