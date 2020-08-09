@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/login.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div id="container">
            @include('pages.login.include._login')
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/login.js');?>
    </script>
@stop
