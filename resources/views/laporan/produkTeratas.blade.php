@extends('layouts.app')
@section('title', ' | Penjualan Bulanan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="fas fa-angle-double-up"></i>
                        PRODUK TERATAS
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card table-responsive">
                    <h5 class="card-header">Bulan ini ({{$bulanTahun}}) : </h5>
                    <div class="card-body table-responsive">
                        <div id="cart1"></div>
                    </div>

                  </div>
            </div>
            <div class="col-md-6">
                <div class="card table-responsive">
                    <h5 class="card-header">Bulan Lalu ({{$last1}}) :</h5>
                    <div class="card-body table-responsive">
                        <div id="chart2"></div>
                    </div>

                  </div>
            </div>
        </div>

        <div class="row" style="margin-top:30px; ">
            <div class="col-md-6">
                <div class="card " >
                    <h5 class="card-header">3 Bulan Terakhir (dari {{ $bulanTahun2}}):</h5>
                    <div class="card-body table-responsive">
                        <div id="chart3"></div>
                    </div>

                  </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <h5 class="card-header">12 Bulan Terakhir (dari {{ $bulanTahun3}}) :</h5>
                    <div class="card-body table-responsive">
                        <div id="chart4"></div>
                    </div>

                  </div>
            </div>
        </div>



    </div>

@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('cart1', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },

   xAxis: {
       categories: {!!json_encode($categories7)!!} ,
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
       name: 'Produk',
       data: {!!json_encode($data7)!!}

   }]
});
</script>


<script>
    Highcharts.chart('chart2', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },

   xAxis: {
       categories: {!!json_encode($categories1)!!},
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
       name: 'Produk',
       data: {!!json_encode($data1)!!}

   }]
});
</script>

<script>
    Highcharts.chart('chart3', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },

   xAxis: {
       categories: {!!json_encode($categories2)!!},
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
       name: 'Produk',
       data: {!!json_encode($data2)!!}
   }]
});
</script>


<script>
    Highcharts.chart('chart4', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },

   xAxis: {
       categories: {!!json_encode($categories3)!!},
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
       name: 'Produk',
       data: {!!json_encode($data3)!!}

   }]
});
</script>
@endsection





