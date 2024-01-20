@extends('admin::layouts.master')

@section('title', 'Module Group')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/module_group.min.css');?>
    </style>
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.module_group.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @include('admin::pages.module_group.include.data_show')
                </div>
                <div class="col-lg-4">
                    @include('admin::pages.module_group.include.edit')
                    @include('admin::pages.module_group.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/module_group.js');?>
    </script>
@endsection

