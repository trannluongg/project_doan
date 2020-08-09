@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/search.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        @include('pages.search.include._search_slideshow')
        @include('pages.search.include._searh_left')
        @include('pages.search.include._search_right')
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/slideshow_search.js');?>
        <?= file_get_contents('assets/js/search_mobile.js');?>
    </script>
@stop
