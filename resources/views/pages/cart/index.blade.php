@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/cart.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div class="ghg-main">
            @if(isset($cart) && !empty($cart))
               <div id="cart">
                   @include('pages.cart.include._cart')
                   @include('pages.cart.include._form')
               </div>
            @else
                <span class="d-block text-center mt-5 mb-5">Chưa có sản phẩm trong giỏ hàng. <a href="/" style="color: #ff9c00">Quay lại trang chủ!</a></span>
            @endif
        </div>
    </div>
    @include('components.modal_login._login')
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/cart.js');?>
    </script>
@stop
