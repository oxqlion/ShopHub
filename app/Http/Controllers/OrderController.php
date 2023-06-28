<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts == null) {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id,
        ]);

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);
            $cart->delete();
        }

        return Redirect::back();
    }

    public function indexOrder()
    {
        $orders = Order::all();
        return view('indexOrder', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        return view('showOrder', compact('order'));
    }

    public function submitPaymentReceipt(Order $order, Request $req)
    {
        $file = $req->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('/public/' . $path, file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back();
    }

    public function confirmPayment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);

        return Redirect::back();
    }
}
