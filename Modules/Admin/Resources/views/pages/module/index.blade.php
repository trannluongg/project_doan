@extends('admin::layouts.master')

@section('title', 'Module')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/module.min.css');?>
    </style>
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dragula.min.css') }}">
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.module.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    @include('admin::pages.module.include.data_show')
                </div>
                <div class="col-lg-5">
                    @include('admin::pages.module.include.edit')
                    @include('admin::pages.module.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/admin/dragula.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/module.js') }}"></script>
@endsection

