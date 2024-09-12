<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Thank you for your order!</h1>

    <p>Your order number is: <strong>{{ $order->order_code }}</strong></p>

    <p>Order Details:</p>

    <ul>
        @foreach ($order->orderItem as $item)
            <li>Name: {{ $item->product->name }} x{{ $item->quantity }} {{ $item->price }} đ</li>
        @endforeach
    </ul>

    <p>Total: <strong>{{ $order->total_amount }}.000 đ</strong></p>
    <p>Address: <strong>{{ $order->user->address }}</strong></p>
    <p>Phone: <strong>{{ $order->user->number }}</strong></p>


    <p>Please confirm your order so we can prepare the items for you.</p>

    <a href="{{ route('order-processing', $order->id) }}"
        style="
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #3033e0;
    text-decoration: none;
    border-radius: 5px;
    border: 1px solid #2831a7;
    font-weight: bold;
    ">Confirm</a>




</body>

</html>
