<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function createProduct()
    {
        return view('createProduct');
    }

    public function storeProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ]);

        $file = $req->file('image');
        $path = time() . '_' . $req->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('/public/' . $path, file_get_contents($file));

        Product::create([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => $path
        ]);

        return Redirect::route('createProduct');
    }

    public function indexProduct()
    {
        $products = Product::all();
        return view('indexProduct', compact('products'));
    }

    public function showProduct(Product $product)
    {
        // $product = Product::find($product);
        return view('detailProduct', compact('product'));
    }

    public function editProduct(Product $product)
    {
        return view('editProduct', compact('product'));
    }

    public function updateProduct(Product $product, Request $req)
    {
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ]);

        $file = $req->file('image');
        $path = time() . '_' . $req->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('/public/' . $path, file_get_contents($file));

        $product->update([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => $path
        ]);

        return Redirect::route('detailProduct', $product);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return Redirect::route('indexProduct');
    }
}
