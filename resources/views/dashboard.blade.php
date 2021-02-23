@extends('layouts.app')
@section('title', ' | Dashboard')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard2 mr-1"></i>
                        DASHBOARD
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="card">
            <div class="card-body">
                <h4>Tautan Cepat :</h4>
                <div class="container">
                    <div class="row">                      
                            <a href="{{ route('Pos.main.index')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-th s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>POS</small></span>
                            </a>
                            <a href="{{ url('product') }}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-barcode s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Produk</small></span>
                            </a>
                            <a href="{{route('Laporan.PenjualanHarian')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-shopping-cart s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>penjualan</small></span>
                            </a>
                            <a href="" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-bell s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Tagihan</small></span>
                            </a>   
                            <a href="{{ route('Kategori.daftarkategori.index')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-folder-open s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Kategori</small></span>
                            </a> 
                            <a href="{{route('Hadiah.hadiah.index')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-credit-card s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Hadiah</small></span>
                            </a>
                            <a href="{{route('Orang.pelanggan.index')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-users s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Pelanggan</small></span>
                            </a>
                            <a href="" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-cogs s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Pengaturan</small></span>
                            </a>  
                            <a href="{{route('Laporan.laporanPenjualan.index')}}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-bar-chart-o s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Laporan</small></span>
                            </a>  
                            <a href="{{ route('pengguna.index') }}" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-users s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Pengguna</small></span>
                            </a>
                            <a href="" class="btn btn-light m-2 border border-secondary">
                                <div class="justify-content-center">
                                    <small><i class="icon-database s-48 text-secondary"></i></small>
                                </div>
                                <span class="text-secondary"><small>Backup</small></span>
                            </a>                
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="height: 40rem;">
                    <div class="card-body">
                        <h5>Chart Penjualan</h5>
                        <div id="chartPenjualan"></div>
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="height: 40rem;">
                    <div class="card-body">
                        <h5>Produk Teratas ( February 2021)</h5>

                        <div id="chartProduk"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
{{-- chart 1 --}}
 <script>
     Highcharts.chart('chartPenjualan', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },

    xAxis: {
        categories: [
            'Feb-2021'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Pajak',
        data: [49.9]

    }, {
        name: 'Diskon',
        data: [83.6]

    }, {
        name: 'Penjualan',
        data: [48.9]

    }]
});
 </script>


{{-- chart 2 --}}
 <script>
     Highcharts.chart('chartProduk', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Other',
            y: 7.05
        }]
    }]
});

 </script>
@endsection
