@extends('layouts.admins.index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    
    <form action="{{ route('logout') }}" method="post" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-custom">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
@endsection
