@extends('admin::layouts.master')

@section('title', 'Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/summernote-bs4.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/product.min.css');?>
    </style>
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.product.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    @include('admin::pages.product.include.data_show')
                </div>
                <div class="col-lg-5">
                    @include('admin::pages.product.include.edit')
                    @include('admin::pages.product.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/select2.full.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/summernote-bs4.js') }}"></script>
    <script>
        $(function () {
            $('.textarea').summernote();
        })
    </script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/product.js');?>
    </script>
@endsection
