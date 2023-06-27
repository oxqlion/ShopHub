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
}
