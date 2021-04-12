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
                        <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box blue r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-shopping-cart  s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum8)}}</h5>
                                    <div class="counter-title"  style="color:white;">Nilai Penjualan</div>
                                </div>
                            </div>
                        </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box orange r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-plus s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($pembelian)}}</h5>
                                <div class="counter-title"  style="color:white;">Nilai Pembelian</div>
                                </div>
                            </div>
                       </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box red r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-chevron-circle-up s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($biaya)}}</h5>
                                    <h6 class="counter-title" style="color:white;">Nilai Biaya</h6>
                                </div>
                            </div>
                       </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box green r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right" style="color:white;">
                                        <span class="icon icon-dollar s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum8)}}</h5>
                                    <h6 class="counter-title" style="color:white;">Untung</h6>
                                </div>
                            </div>
                       </div>
                        <div class="table-responsive" style=" margin-top: 50px;">

                            <table class="table table-bordered" style="text-align: center; width: 1110px; ">

                                <tr height="50px">

                                   <td colspan="12">
                                      <span >{{$thn}}</span>
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
                                       {{-- januari --}}
                                        <td>
                                            <table border="2" >

                                                    <tr>
                                                       <td>Total</td>

                                                       <td>{{$laporan1}}</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Pajak</td>
                                                        <td>{{$pajak1}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diskon</td>
                                                        <td>{{$diskon1}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grand Total</td>
                                                        <td>{{$bulan1}}</td>
                                                    </tr>
                                                    <tr>
                                                       <td>Dibayar</td>
                                                       <td>{{$dibayar1}}</td>
                                                    </tr>

                                            </table>
                                        </td>

                                        {{-- februari --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan2}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak2}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon2}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan2}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar2}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- maret --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan3}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak3}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon3}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan3}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar3}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- april --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan4}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak4}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon4}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan4}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar4}}</td>
                                                 </tr>
                                        </table>
                                        </td>

                                        {{-- mei --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan5}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak5}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon5}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan5}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar5}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- juni --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan6}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak6}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon6}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan6}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar6}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- juli --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan7}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak7}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon7}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan7}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar7}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- agustus --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan8}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak8}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon8}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan8}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar8}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- september --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan9}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak9}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon9}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan9}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar9}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- oktober --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan10}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak10}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon10}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan10}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar10}}</td>
                                                 </tr>
                                        </table>
                                        </td>

                                        {{-- november --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan11}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak11}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon11}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan11}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar11}}</td>
                                                 </tr>

                                        </table>
                                        </td>

                                        {{-- desember --}}
                                        <td>
                                            <table border="2" >

                                                <tr>
                                                    <td>Total</td>

                                                    <td>{{$laporan12}}</td>

                                                 </tr>
                                                 <tr>
                                                     <td>Pajak</td>
                                                     <td>{{$pajak12}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Diskon</td>
                                                     <td>{{$diskon12}}</td>
                                                 </tr>
                                                 <tr>
                                                     <td>Grand Total</td>
                                                     <td>{{$bulan12}}</td>
                                                 </tr>
                                                 <tr>
                                                    <td>Dibayar</td>
                                                    <td>{{$dibayar12}}</td>
                                                 </tr>

                                        </table>
                                        </td>
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
