@extends('layouts.clients.index')
@section('title', 'Detail Product')

@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show position-fixed fixed-bottom w-25"
            style="right: 15px; bottom: 15px; z-index: 1050;">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
        @csrf
        <div class="row mt-5 ">

            <div class="col-md-6">
                <img src="{{ $product->image }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="product-title">{{ $product->name }}</h1>
                <h2 class="product-price" style="color: red">{{ $product->price . ' VND' }}</h2>
                <input type="hidden" name="price" value="{{ $product->price }}" id="">
                <p class="product-description">
                    {{ $product->description }}
                </p>
                <div class="container my-4">
                    <div class="row ">
                        <div class="col-auto">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="decreaseQuantity">-</button>
                                </div>
                                <input type="number" class="form-control text-center" id="quantity" value="1"
                                    min="1" name="quantity">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="increaseQuantity">+</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('assets/clients/js/app.js') }}"></script>
@endsection
