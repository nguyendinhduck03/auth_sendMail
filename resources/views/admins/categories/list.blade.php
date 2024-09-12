@extends('layouts.admins.index')

@section('titlePage', 'Categories')

@section('content')

    <h4>Category List</h4>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href=" {{ route('categories.edit', $category->id) }}"
                            class="btn btn-primary btn-sm btn-custom">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
    <a href="{{ route('categories.create') }}" class="btn btn-success btn-md btn-custom">Add</a>
@endsection
