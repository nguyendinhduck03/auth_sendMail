@extends('layouts.admins.index')

@section('titlePage', 'Products')

@section('content')

    <h4>Product List</h4>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{Storage::url($product->image)}}" alt="" width="50px">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ Str::limit($product->description, 40) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href=" {{ route('products.edit', $product->id) }}"
                            class="btn btn-primary btn-sm btn-custom">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display: inline;">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('Bạn chắc chắn chứ ?') " type="submit"
                                class="btn btn-danger btn-sm btn-custom">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.create') }}" class="btn btn-success btn-md btn-custom">Add</a>
@endsection
