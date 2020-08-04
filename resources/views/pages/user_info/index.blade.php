@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/user_info.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div class="_2uaMPO">
            @include('pages.user_info.include._left_user_info')
            @include('pages.user_info.include._right_user_info')
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/user_info.js');?>
    </script>
@stop
