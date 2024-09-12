@extends('layouts.admins.index')

@section('titlePage', 'Orders')

@section('content')

    <h4>Order Detail</h4>

    <!-- Customer Information -->
    <div class="card mb-4">
        <div class="card-header">
            Customer information
        </div>
        <div class="card-body">
            <p><strong>Order Code:</strong> {{ $order->order_code }}</p>
            <p><strong>Customer:</strong> {{ $order->user->name }}</p>
            <p><strong>Phone:</strong> {{ $order->user->number }}</p>
            <p><strong>Address:</strong> {{ $order->user->address }}</p>
        </div>
    </div>

    <!-- Product List -->
    <div class="card mb-4">
        <div class="card-header">
            Product List
        </div>
        <div class="card-body">
            <table class="table table-striped order-detail-table">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItem as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->quantity * $item->price }} .000 đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Total Price -->
            <div class="total-price mt-3">
                <p><strong>Total Amount:</strong> {{ $order->total_amount }} .000 đ</p>
            </div>
        </div>
    </div>
    @if ($order->status == 'processing')
        <a href="{{ route('orders.confirm', $order->id) }}" class="btn btn-success">Order Confirmation</a>
    @endif
@endsection
