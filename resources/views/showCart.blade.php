<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cart</title>
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>Error : {{ $error }}</p>
        @endforeach
    @endif
    
    @foreach ($carts as $cart)
        <img src="{{ url('storage/' . $cart->product->image) }}" height="100px" alt="">
        <p>Name : {{ $cart->product->name }}</p>
        <form action="{{ route('updateCart', $cart) }}" method="post">
            @method('patch')
            @csrf
            <input type="number" name="amount" value="{{ $cart->amount }}">
            <button type="submit">Update Amount</button>
        </form> <br>

        <form action="{{ route('deleteCart', $cart) }}" method="post">
        @method('delete')
        @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <button type="submit">Checkout</button>
    </form>

</body>

</html>
