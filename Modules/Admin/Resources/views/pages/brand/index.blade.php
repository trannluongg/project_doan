@extends('admin::layouts.master')

@section('title', 'Brand')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/brand.min.css');?>
    </style>
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.brand.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    @include('admin::pages.brand.include.data_show')
                </div>
                <div class="col-lg-5">
                    @include('admin::pages.brand.include.edit')
                    @include('admin::pages.brand.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/brand.js');?>
    </script>
@endsection
