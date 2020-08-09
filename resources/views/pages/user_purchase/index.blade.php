@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/user_info.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div class="_2uaMPO">
            @include('components.user._left_user_info')
            @include('pages.user_purchase.include._user_info_order')
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/user_info.js');?>
    </script>
@stop
