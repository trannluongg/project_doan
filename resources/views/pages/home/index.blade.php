@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/home.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        @include('components.slideshow._slide_index')
        @include('components.slideshow._slide_index_two')

        <h2 class="fs-hshd">
            <img src="{{ asset('assets/images/title.png') }}" alt="">
        </h2>

        @include('pages.home.include._promotion')
        @include('pages.home.include._top_phone')
        @include('pages.home.include._top_laptop')
        @include('pages.home.include._top_tablet')
        @include('pages.home.include._top_pin')
        @include('pages.home.include._top_microphone')
        @include('pages.home.include._accessories')
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/slideshow_index.js');?>
        <?= file_get_contents('assets/js/home.js');?>
    </script>
@stop




