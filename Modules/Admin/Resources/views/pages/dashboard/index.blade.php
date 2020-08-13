@extends('admin::layouts.master')

@section('title', 'Dashboard')

@section('css')
@endsection

@section('content')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $bill_count ?? 0 }}</h3>

                            <p>Recently Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('get.bills.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user_count ?? 0 }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('get.users.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Top 5 sản phẩm bán được nhiều nhất
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart-top-product" style="height: 300px; padding: 0px; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Tổng tiền theo tháng
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart-sum-money" style="height: 300px; padding: 0px; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ url('assets/js/admin/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/admin/jquery.flot.resize.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/admin/jquery.flot.pie.js') }}"></script>
    <script>
        /*
    * BAR CHART
    * ---------
    */
        var bar_data_top_product = {
            data: [<?= $product_bill ?>],
            bars: {show: true}
        }
        $.plot('#bar-chart-top-product', [bar_data_top_product], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true, barWidth: 0.5, align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                mode: 'categories',
                tickLength: 0
            }
        });
    </script>
    <script>
        var bar_data_sum_money = {
            data: [<?= $sum_money_month ?>],
            bars: {show: true}
        }
        $.plot('#bar-chart-sum-money', [bar_data_sum_money], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true, barWidth: 0.5, align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                mode: 'categories',
                tickLength: 0
            }
        })
        /* END BAR CHART */
    </script>
@endsection
