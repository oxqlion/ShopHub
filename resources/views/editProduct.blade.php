<!DOCTYPE html>
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
</html>