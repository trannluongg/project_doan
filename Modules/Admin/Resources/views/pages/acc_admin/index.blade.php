@extends('admin::layouts.master')

@section('title', 'Account Admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/toastr.css') }}">
    <style>
        <?= $style = file_get_contents('assets/css/acc_admin.min.css');?>
    </style>
    <link rel="stylesheet" href="{{ asset('assets/core/css/admin/select2.css') }}">
@endsection

@section('content')
    @include('admin::components.loading.loading')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin::pages.acc_admin.include.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @include('admin::pages.acc_admin.include.data_show')
                </div>
                <div class="col-lg-4">
                    @include('admin::pages.acc_admin.include.edit_avatar')
                    @include('admin::pages.acc_admin.include.edit')
                    @include('admin::pages.acc_admin.include.add')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/core/js/admin/select2.full.js') }}"></script>
    <script type="text/javascript">
        $('#reservationdate, #reservationdate-edit').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        <?= file_get_contents('assets/js/acc_admin.js');?>
    </script>
@endsection
