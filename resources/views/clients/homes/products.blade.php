@extends('layouts.clients.index')
@section('title', 'Products')
    
@section('content')

    <h1 class="mt-5 mb-4 text-center">Products</h1>

    @foreach ($categories as $category)
        <h2 class="mt-4 mb-4">{{ $category->name }}</h2>
        <div class="row">
            @foreach ($category->product as $product)
                <div class='col-md-3 mb-3'>
                    <div class='card'>
                        <img src='{{ $product->image }}' class='card-img-top' alt='' height="150px">
                        <div class='card-body'>
                            <h5 class='card-title'>{{ $product->name }}</h5>
                            <p class='card-text' style="color: red"><b>{{ $product->price . ' VND' }}</b></p>
                            <a href='{{ route('detail-product', $product->id) }}' class='btn btn-primary'>Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@endsection
