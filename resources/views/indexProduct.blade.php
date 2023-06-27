<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    @foreach ($products as $product)
        <p>Name : {{ $product->name }}</p>
        <img src="{{ url('storage/' . $product->image) }}" height="100px" alt="">
        <form action="{{ route('detailProduct', $product) }}" method="get">
            @csrf
            <button type="submit">Show Detail</button>
        </form>
        <form action="{{ route('deleteProduct', $product) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach
</body>
</html>