@extends('layouts.admins.index')

@section('titlePage', 'Categories')

@section('content')

    <h4>Add Category</h4>
    <div class="row">
        <div class="col-md-8">

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="name" value="" required>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
