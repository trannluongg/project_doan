@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/search_mobile.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap mf-body">
        @include('pages.search.include.mobile._search_price_mobile')
        @include('pages.search.include.mobile._search_brand_mobile')
        @include('pages.search.include.mobile._sort')
        @include('pages.search.include.mobile._result_search_mobile')
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/blazy.js');?>
        <?= file_get_contents('assets/js/search_mobile.js');?>
    </script>
@stop

