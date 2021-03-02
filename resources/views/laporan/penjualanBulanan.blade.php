@extends('layouts.app')
@section('title', ' | Penjualan Bulanan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        PENJUALAN BULANAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="blue counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-shopping-cart s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated text" style="color:white;" >1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Penjualan</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="orange counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-plus s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Pembelian</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="red counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-chevron-circle-up s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Biaya</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="green counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-dollar s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Untung</h6>
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-top: 50px;">

                            <table class="table table-bordered" style="text-align: center; width: 1110px; ">

                                <tr height="50px">
                                   <td>
                                       <a href="#"  onclick="reev()">< <</a>
                                    </td>
                                   <td colspan="10">
                                      <span >{{$Tahun->tahun}}</span>
                                    </td>
                                   <td>
                                       <a href="#" onclick="next()">> ></a>
                                    </td>
                                </tr>

                                    <tr height="50px"  width="50px" >
                                        <td>Januari</td>
                                        <td>Februari</td>
                                        <td>Maret</td>
                                        <td>April</td>
                                        <td>Mei</td>
                                        <td>Juni</td>
                                        <td>Juli</td>
                                        <td>Agustus</td>
                                        <td>September</td>
                                        <td>Oktober</td>
                                        <td>November</td>
                                        <td>Desember</td>
                                    </tr>

                                    <tr height="50px">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
// tahun
    $(document).ready(function(){
	$('#thn').text(thn);
});
var thn = 2021;
    function next(){

    //   thn = ++thn;
    //   $('#thn').text(thn);
    // $('#increment').html(thn);
//  console.log(thn);

        $.post("{{ route('Laporan.increment') }}", {'_method' : 'PATCH'}, function(data) {
            console.log(data);
            location.reload();
         }, "JSON").fail(function(data){
            console.log(data);
        });

    }

    function reev(){
    // thn =  --thn;
    // $('#thn').text(thn);
    //  $('#decrement').html(thn);
    // $('#tahun').html(thn);

    // console.log(thn);
    $.post("{{ route('Laporan.decretment') }}", {'_method' : 'PATCH'}, function(data) {
            console.log(data);
            location.reload();
         }, "JSON").fail(function(data){
            console.log(data);
        });


    }


</script>

@endsection
