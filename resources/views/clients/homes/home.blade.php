@extends('layouts.clients.index')

@section('title', 'Home')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed fixed-bottom w-50"
            style="right: 15px; bottom: 15px; z-index: 1050;">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @include('clients.blocks.slider')

    <h1 class="mt-5 mb-4 text-center">New Products</h1>

    <div class="row">
        @foreach ($products as $product)
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='{{ $product->image }}' class='card-img-top' alt='' height="200px">
                    <div class='card-body'>
                        <h5 class='card-title'>{{ $product->name }}</h5>
                        <p class='card-text' style="color: red"><b>{{ $product->price . ' VND' }}</b></p>
                        <a href='{{ route('detail-product', $product->id) }}' class='btn btn-primary'>Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/clients/js/app.js') }}"></script>
@endsection
