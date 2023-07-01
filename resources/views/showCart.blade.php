@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>Error : {{ $error }}</p>
                            @endforeach
                        @endif

                        @php
                            $totalPrice = 0;
                        @endphp

                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card m-3" style="width: 14rem;">
                                    <img src="{{ url('storage/' . $cart->product->image) }}" alt="image"
                                        class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('updateCart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" name="amount"
                                                    aria-describedby="basic-addon2" value="{{ $cart->amount }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary">Update
                                                        Amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('deleteCart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                @php
                                    $totalPrice += $cart->product->price * $cart->amount;
                                @endphp

                            @endforeach
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-end">
                            <p>Total : Rp{{ $totalPrice }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    @if ($carts->isEmpty()) disabled @endif>
                                    Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
