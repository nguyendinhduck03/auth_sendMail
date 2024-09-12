@extends('layouts.admins.index')

@section('titlePage', 'Products')

@section('content')

    <h4>Add Product</h4>
    <div class="row">
        <div class="col-md-8">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" value="" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" value="" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="">
                </div>
                <div class="form-group mb-3">
                    <label for="categorySelect" class="form-label">Category</label>
                    <select class="form-select" id="categorySelect" name="category_id">
                        <option selected disabled>Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
