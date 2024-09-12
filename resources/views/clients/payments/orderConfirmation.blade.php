@extends('layouts.clients.index')
@section('title', 'Order Confirmation')
@section('content')
    <form action="{{route('create-order')}}" method="POST">
        @csrf
        <div class="row">
            <h1 class="col-md-12 mb-4 mt-3">Order Confirmation</h1>
            <div class="col-md-6">
                <h3>User Information</h3>
                <div class="card p-3">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name:</strong></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><strong>Phone:</strong></label>
                        <input type="tel" class="form-control" id="phone" name="number" value="{{$user->number}}" placeholder="Enter number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Address:</strong></label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{$user->address}}" placeholder="Enter address" required>
                    </div>
    
                </div>
            </div>
            
            <div class="col-md-6">
                <h3>Order Details</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50" alt="Product Image">
                                </td>
                                <td>{{ $item->product->name }} x{{ $item->quantity }}</td>
                                <td>{{ $item->price }} đ</td>
                                <td>{{ $item->quantity * $item->price }}.000 đ</td>
                            </tr>
                            <input type="hidden" name="products[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                            <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                            <input type="hidden" name="products[{{ $loop->index }}][price]" value="{{ $item->quantity * $item->price }}">
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <h5>Total Price: {{ $totalAmount }}.000 đ</h5>
                    <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                    <button class="btn btn-primary">Confirm Order</button>
                </div>
            </div>
        </div>
    </form>
@endsection
