@extends('layouts.clients.index')
@section('title', 'Cart')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="mb-4 mt-4">Shopping Cart</h1>

    <form action="{{route('order-confirmation')}}" method="POST">
        @csrf
        <table class="table cart-table">
            <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td><img src="https://via.placeholder.com/100" alt="Product Image"></td>
                        <td>{{$cartItem->product->name}}</td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a href="{{route('change-cart', ['action' => 'less', 'id' => $cartItem->id])}}" class="btn btn-outline-secondary">-</a>
                                </div>
                                <input type="number" class="form-control text-center quantity"  value="{{$cartItem->quantity}}"
                                    min="1" style="width: 20px;">
                                <div class="input-group-append">
                                    <a href="{{route('change-cart', ['action' => 'add', 'id' => $cartItem->id])}}" class="btn btn-outline-secondary">+</a>
                                </div>
                            </div>
                        </td>
                        <td style="color: red; font-weight:bold">{{$cartItem->price. ' đ'}}</td>
                        <td style="color: red; font-weight:bold">{{$cartItem->price*$cartItem->quantity }}.000 đ</td>
                        <td>
                            <a href="{{route('remove-cart', $cartItem->id)}}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                    @php
                        $total += $cartItem->price*$cartItem->quantity;
                    @endphp
                @endforeach
            </tbody>
        </table>
        @if ($cartItems->isEmpty())
            <p class="text-center">Cart is empty</p>
        @endif

        <h3>Total Price:</h3>
        <div class="cart-footer d-flex justify-content-between">  
            <h4 class="mb-0" style="color: red">{{$total}}.000 đ</h4>
            <input type="hidden" name="total_amount" id="" value="{{$total}}">
            <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
        </div>
    </form>

@endsection

