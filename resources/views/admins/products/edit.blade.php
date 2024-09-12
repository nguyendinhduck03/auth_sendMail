@extends('layouts.admins.index')

@section('titlePage', 'Products')

@section('content')

    <h4>Edit Product</h4>
    <div class="row">
        <div class="col-md-8">

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
                </div>
                <div class="form-group mb-3">
                    <img src="{{ Storage::url($product->image) }}" alt="" width="70px">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" value="" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="84" rows="5">{{$product->description}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                </div>
                <div class="form-group mb-3">
                    <label for="categorySelect" class="form-label">Category</label>
                    <select class="form-select" id="categorySelect" name="category_id">
                        <option disabled>Choose a category</option>
                        @foreach ($categories as $category)
                            <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
