@extends('admin::layouts.master')

@section('title', 'Brand')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/bill_admin.min.css');?>
    </style>
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.bill.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @include('admin::pages.bill.include.data_show')
                </div>
                <div class="col-lg-4">
                    @include('admin::pages.bill.include.edit')
                </div>
            </div>
        </div>
        @include('admin::components.modal.bill_detail')
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/admin/daterangepicker_format.js') }}"></script>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/bill_admin.js');?>
    </script>
@endsection
