@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/product_user.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        @include('pages.product.include._product_slideshow')
        @include('pages.product.include._product_brand')
       <div class="product">
           @include('pages.product.include._product_new')
           @include('pages.product.include._product_new_1')
{{--           @include('pages.product.include._product_new_2')--}}
{{--           @include('pages.product.include._product_new_3')--}}
       </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/slideshow_product.js');?>
        <?= file_get_contents('assets/js/product.js');?>
    </script>
@stop
