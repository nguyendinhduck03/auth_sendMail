@extends('layouts.clients.index')
@section('title', 'Thank You')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
@endsection
@section('content')
    <div class="container thank-you-container">
        <h1 class="thank-you-message">Cảm ơn bạn đã đặt hàng!</h1>
        <p>Đơn hàng <strong>{{$orderCode}}</strong> đã được xử lý thành công. Chúng tôi sẽ gửi email xác nhận và thông tin giao hàng cho bạn trong thời gian sớm nhất.</p>
        <a href="{{route('home')}}" class="btn btn-custom">Quay lại trang chính</a>
        <a href="https://gmail.com" target="_blank" class="btn btn-custom">Kiểm tra Email của bạn</a>
    </div>
@endsection
