@extends('admin::layouts.master')

@section('title', 'Permission')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/permission.min.css');?>
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/admin/select2.css') }}">
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.permission.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @include('admin::pages.permission.include.data_show')
                </div>
                <div class="col-lg-4">
                    @include('admin::pages.permission.include.edit')
                    @include('admin::pages.permission.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/admin/select2.full.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/permission.js');?>
    </script>
@endsection

