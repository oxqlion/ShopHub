<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
</head>

<body>
    @foreach ($orders as $order)
        <p>ID : {{ $order->id }}</p>
        <p>User : {{ $order->user->name }}</p>
        <p>Date : {{ $order->created_at }}</p>
        @if ($order->is_paid == true)
            <p>Paid</p>
        @else
            @if ($order->payment_receipt)
                <a href="{{ url('storage/' . $order->payment_receipt) }}">Show Payment Receipt</a>
            @endif
            <p>Unpaid</p>
            <form action="{{ route('confirmPayment', $order) }}" method="post">
                @csrf
                <button type="submit">Confirm</button>
            </form>
        @endif
    @endforeach
</body>

</html>
