@extends('layouts.app')
@section('title', 'TranLuong')
@section('css')
    <style>
        <?= $style = file_get_contents('assets/css/register.min.css');?>
    </style>
@stop

@section('content')
    <div class="f-wrap">
        <div id="container">
            @include('pages.register.include._register')
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        <?= file_get_contents('assets/js/register.js');?>
    </script>
@stop
