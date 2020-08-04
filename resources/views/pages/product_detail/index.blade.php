@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/product_detail.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div class="fs-dtprodif fs-dtbox">
            @include('pages.product_detail.include._title_product')
            @include('pages.product_detail.include._product_detail')
        </div>
        @include('pages.product_detail.include._product_same_brand')
        @include('pages.product_detail.include._product_same')
        @include('pages.product_detail.include._product_info')
        @include('components.modal_product._product_detail')
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/product_detail.js');?>
    </script>
@stop

