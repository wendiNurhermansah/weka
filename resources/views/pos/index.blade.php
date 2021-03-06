@extends('layouts.app')
@include('pos.navigasiKategori')
@include('pos.notePayable')
@include('pos.pelanggan')
@include('pos.pajak')
@include('pos.diskon')
@include('pos.hadiah')
@include('pos.tutupDaftar')
@include('pos.penjualanHariIni')
@include('pos.register')
@include('pos.shortcut')
@include('pos.printOrder')
@include('pos.printBill')
@include('pos.payment')
@include('pos.tahan')
@section('title', ' | '.$title.'')
@section('style')
<style>
    .product-card {
        width: auto;
        height: 460px;
    }
    .product-nav{
        position: absolute;
        height: 10px;
    }
    .button-footer{
        width: 100px;
    }
    .searchProduk{
        width: 70px;
        border:none;
    }
    .searchProduk:focus{
        outline:none;
    }
    #tableProduk < thead tfoot{
        position: sticky;
    }
</style>
@stack('style')
@endsection
@section('topbar')
    <li id="shortcut-nav-li" type="none" class="mx-2 fs-13 text-white">
        <a id="shortcut-nav" data-toggle='modal' data-target='#shortcut'><i class="icon-key"></i></a>
    </li>
    <li id="register-nav-li" type="none" class="mx-2 fs-13 text-white">
        <a id="register-nav" data-toggle='modal' data-target='#register'>Register Details</a>
    </li>
    <li id="penjualanHariIni-nav-li" type="none" class="mx-2 fs-13 text-white">
        <a id="penjualanHariIni-nav" data-toggle='modal' data-target='#penjualanHariIni'>Today's Sale</a>
    </li>
    <li id="tutupDaftar-nav-li" type="none" class="mx-2 fs-13 text-white">
        <a id="tutupDaftar-nav" data-toggle='modal' data-target='#tutupDaftar'>Close Register</a>
    </li>
    <li id="kategori-nav-li" type="none" class="mx-2 fs-13 text-white">
        <a id="kategori-nav" data-toggle="control-sidebar"><i class="icon-file"></i></a>
    </li>
@endsection
@section('content')
<form id="formPayment" action="{{route('Pos.main.store')}}" method="POST">
    @csrf
    <div class="page has-sidebar-left height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4>
                            <i class="icon icon-list"></i>
                            List {{ $title }}
                        </h4>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid my-3">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row mx-2">
                <div class="card col-md-5" style="height:500px;">
                    <div class="card-body">
                        <!-- <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">NO</th>
                                    <th>Tanggal</th>
                                    <th>Referensi</th>
                                    <th>Total</th>
                                    <th>Catatan</th>
                                    <th width="60">Tindakan</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div> -->
                        <div class="form-group">
                            <input class="form-control" type="text" id="cariPelanggan" placeholder="nama pelanggan">
                            <a class="btn border" id="tambahPelanggan" data-toggle="modal" data-target="#pelanggan"><i class="icon icon-add"></i></a>
                        </div>
                        <div class="form-group">
                            <input type="text" id="note" name="note" class="form-control" placeholder="Rerefence Note">
                        </div>
                        <div class="form-group">
                                <input class="form-control" type="text" id="cariProduk" onclick="" placeholder="Search product by code or name, you can scan barcode too">
                        </div>
                        <div class="form-group table-responsive">
                            <table id="tableProduk" class="table-responsive" style="height:180px">
                                <thead>
                                    <tr class="bg-success text-black">
                                        <th width="40" text-align="center">product</th>
                                        <th width="10" text-align="center">price</th>
                                        <th width="10" text-align="center">qty</th>
                                        <th width="20"  text-align="center" >Subtotal</th>
                                        <th width="5" text-align="center"><i class="icon-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="appendd"></tbody>
                                @isset($penjualan)
                                    @foreach($penjualan as $p)
                                        {{$p->biaya_satuan}}<br>
                                        {{$p->sub_total}}<br>
                                    @endforeach
                                @endisset
                                <tfoot>
                                    <tr>
                                        <th>Total Items</th>
                                        <th><span id="totalItems" name="totalItems">0</span></th>
                                        <th>Total</th>
                                        <th><span id="tabelTotal" name="tabelTotal">0</span></th>
                                    </tr>
                                    <tr>
                                        <th><a data-toggle="modal" data-target="#modalDiskon" class="text-primary">Discount</a></th>
                                        <th>(<span id="nilaiDiskon"></span>%)<span id="hasilDiskon" name="hasilDiskon"></span></th>
                                        <th><a data-toggle="modal" data-target="#modalPajak" class="text-primary">Order Tax</a></th>
                                        <th>(<span id="nilaiPajak"></span>%)<span id="hasilPajak" name="hasilPajak"></span></th>
                                    </tr>
                                    <tr>
                                        <th>Total Payable <a data-toggle="modal" data-target="#modalNotePayable"><i class="text-primary icon-comment"></i></a></th>
                                        <th class="text-right"><span id="totalPayable" name="totalPayable"></span></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-warning button-footer" id="buttonHold" data-toggle="modal" data-target="#hold">Hold</button>
                                <button type="button" class="btn btn-danger button-footer" data-toggle="modal" data-target="#cancel">Cancel</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="buttonPrintOrder" class="btn btn-primary h-50 button-footer" data-toggle="modal" data-target="#printOrder">Print Order</button>
                                <button type="button" id="buttonPrintBill" class="btn btn-dark h-50 button-footer" data-toggle="modal" data-target="#bill">Print Bill</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success py-4 button-footer" data-toggle="modal" data-target="#modalPayment" id="buttonPayment">Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7" id="data_kartu">
                    <div class="h-75 mb-5">
                        <div class="row ml-4 pl-2">
                            @foreach ($kartu as $k)
                            <div class="m-1">
                                    <button type="button" id="klik-kartu" class="card m-1 border-0" onclick="searchProduk({{$k->id}})" style="width: 10rem;">
                                        <img class="card-img-top" src="{{config('app.sftp_src').'images/'.$k->gambar}}" alt=""  width="10" height="40">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><small>{{$k->nama}}</small></li>
                                            <li class="list-group-item"><small>{{$k->harga_jual}}</small></li>
                                        </ul>
                                    </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-nav row text-white w-100 mt-4 pt-2">
                        <button type="button" to="{!! $kartu->previousPageUrl() !!}" onclick="pageLink(1)" id="pagePrevious" class="btn btn-secondary col-md-4 font-weight-bold border-0"><</button>
                        <button type="button" class="btn btn-success col-md-4 font-weight-bold" data-toggle="modal" data-target="#hadiah">
                            <i class="icon icon-folder"></i>Sell Gift Card
                        </button>
                        {{-- modal --}}
                        <button type="button" to="{{ $kartu->nextPageUrl() }}" onclick="pageLink(2)" id="pageNext" class="pageNext btn btn-secondary col-md-4 font-weight-bold border-0">></button>
                    </div>
                    {{-- {!! $kartu->links() !!} --}}
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cancel" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content w-50 mx-auto">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomorKartu" class="font-weight-bold">Are you sure ?</label>
                    </div>
                    <div class="row m-1">
                        <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">No</button>
                        <a class="btn btn-primary ml-auto" href="{{url('/')}}">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stack('modal')
@endsection
@section('script')
    <script type="text/javascript">
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            function pageLink(n){
                    if(n==2){
                        // alert("yes")
                        var page = $('.pageNext').attr('to').split('page=')[1];
                        console.log(page)
                    }else{
                        // alert('no')
                        var page = $('.pagePrevious').attr('to').split('page=')[1];
                        console.log(page)
                    }

                    $.ajax({
                        url:"{{route('Pos.produkKartu')}}",
                        method: "GET",
                        data: {_token: CSRF_TOKEN, page:page},
                        success:function(data){
                            $('#data_kartu').html(data)

                            if(n==2){
                                // alert("yes")
                                var link = $(".pageNext").attr('to')
                            }else{
                                // alert("no")
                                var link = $(".pagePrevious").attr('to')
                            }
                            links = link.replace('produkKartu','main')
                            // console.log("ps",link)
                            if(n==2){
                                $(".pageNext").attr('to',links)
                            }else{
                                $(".pagePrevious").attr('to',links)
                            }
                        }
                    })
            }

            var formAdd = 0;

            function hitungKuantitas(i){
                    var kuantitas  = $("#kuantitas_"+i).val();
                    console.log(i);
                    console.log(kuantitas);
                    var biaya = $("#biaya_satuan_"+i).val();
                    console.log(biaya);
                    var total = kuantitas * biaya
                    $("#sub_total_"+i).val(total);
                    console.log(total);
                    var row = $('#appendd tr').length;
                    console.log(row);
                    total1 =0;
                    // var ini = $("#appendd tr:eq(0) td:eq(3) input").val();
                    // console.log(ini)
                    for (index = 1; index <= row; index++) {
                        console.log(index);
                        var sub = $('#tableProduk tr:eq('+index+') > td:eq(3) input').val();
                        console.log('sub'+sub);
                        var total1 = parseInt(total1) + parseInt(sub);
                        console.log(total1)
                        $('#tabelTotal').html(total1);
                    }

                    var diskon = $('#nilaiDiskon').html();
                    var total = $('#tabelTotal').text();
                    hasilDiskon = total * diskon / 100 ;
                    $('#hasilDiskon').html(hasilDiskon);
                    bayar = total - hasilDiskon + parseFloat(hasilPajak);
                    bayar = bayar.toFixed(2);
                    $('#totalPayable').html(bayar);

                    // var hasilDiskon = $('#hasilDiskon').text();
                    // bayar = parseFloat(total - hasilDiskon) + parseFloat(hasilPajak);
                    // $('#totalPayable').html(bayar);

                    pajak = $('#nilaiPajak').html();
                    var total = $('#tabelTotal').text();
                    hasilPajak = total * pajak / 100;
                    $('#hasilPajak').html(hasilPajak);
                    bayar = parseFloat(total - hasilDiskon) + parseFloat(hasilPajak);
                    $('#totalPayable').html(bayar);
            }

            function hapusTable(formAdd){
                    sub = $('#sub_total_'+formAdd).val();
                    console.log('-'+sub)
                    var total = $('#tabelTotal').html();
                    console.log(total)
                    totals = parseInt(total) - parseInt(sub);
                    console.log(totals)
                    $('#tabelTotal').html(totals);
                    $('#trTable_'+formAdd).remove();

                    var diskon = $('#nilaiDiskon').html();
                    var total = $('#tabelTotal').text();
                    hasilDiskon = total * diskon / 100 ;
                    $('#hasilDiskon').html(hasilDiskon);
                    bayar = total - hasilDiskon + parseFloat(hasilPajak);
                    $('#totalPayable').html(bayar);

                    pajak = $('#nilaiPajak').html();
                    var total = $('#tabelTotal').text();
                    hasilPajak = total * pajak / 100;
                    $('#hasilPajak').html(hasilPajak);
                    bayar = parseFloat(total - hasilDiskon) + parseFloat(hasilPajak);
                    $('#totalPayable').html(bayar);
            }

            $(document).ready(function(){
                $('#closeBill').click(function () {
                    console.log('tutup')
                    $('#bill').modal('toggle')
                });
                $('#modalPayment').on('hidden.bs.modal', function () {
                    $('#dataProduk > div').remove()
                    $('#dataProduk > input').remove()
                })
                $('#printOrder').on('hidden.bs.modal', function () {
                    $('#appendOrder > tr').remove()
                })
                $('#hold').on('hidden.bs.modal', function () {
                    $('#HoldDataProduk > div').remove()
                    $('#HoldDataProduk > input').remove()
                })
                // $('#cariPelanggan').focus(function() {
                //     if($('#cariPellangggan').val() == null){
                //         alert('nama blom')
                //     }else{
                //         $('#cariPelanggan').keyup(){
                //             alert('input')
                //         }
                //     }
                // })
                //page links
                // $('#pageNext').click(function(e){

                    // e.preventDefault()

                // })

                // $('#pagePrevious').click(function(e){
                //     e.preventDefault()
                //     var page = $(this).attr('href').split('page=')[1];
                //     console.log(page)
                //     fetch_previous(page)
                // })

                // function fetch_previous(page){
                //     $.ajax({
                //         url:"{{route('Pos.produkKartu')}}",
                //         method: "GET",
                //         data: {_token: CSRF_TOKEN, page:page},
                //         success:function(data){
                //             $('#data_kartu').html(data)
                //         }
                //     })
                // }

                // function fetch_next(pageNext){
                //     $.ajax({
                //         url:"{{route('Pos.produkKartu')}}",
                //         method: "GET",
                //         data: {_token: CSRF_TOKEN, page:pageNext},
                //         success:function(data){
                //             $('#data_kartu').html(data)
                //         }
                //     })
                // }

                // total
                $("#tabelTotal").html(0);

                // totalPayable
                $("#totalPayable").html('0');

                // nav
                $("#pos-nav-li").remove();
                // $("#navigasi").add("<li id='shortcut-nav-li' type='none' class='mx-2 fs-13 text-white'><a id='shortcut' href='' data-toggle='modal' data-target='#shortcut'><i class='icon-key'></i></a></li>").appendTo("#navigasi");

                // ajax get product
                $( "#cariProduk" ).autocomplete({
                        source: function( request, response ) {
                            // Fetch data
                            $.ajax({
                            url:"{{route('Pos.cariProduk')}}",
                            method: "GET",
                            type: 'get',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function( data ) {
                                console.log(data)
                                if(data[0] == null){
                                    data[0] = 'Data tidak ditemukan'
                                }
                                // console.log(data);
                                response( data );
                            }
                            });
                        },
                        select: function (event, ui) {
                            // Set selection
                            searchProduk(ui.item.id);
                            // console.log(ui.item.id);
                            // $('#kategori').val(ui.item.value);
                            // $('#kategori').val(ui.item.label);
                            // display the selected text
                            // $('tbody').html(data);
                            return false;
                        }
                });


                function hitungTotal(j){
                    var row = $('#dataTable > tbody > tr').length;
                    total1 =0;
                    for (let index = 1; index <= row; index++) {
                        var sub = $("#sub_total_"+index).val();
                        var total1 = parseInt(total1) + parseInt(sub);
                        $('#tabelTotal').val(total1);
                    }
                }

                var table = $('#dataTable').dataTable({
                    processing: true,
                    serverSide: true,
                    pageLength: 15,
                    order: [ 0, 'asc' ],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    ajax: {
                        url: "{{ route($route.'api') }}",
                        method: 'POST'
                    },

                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                        {data: 'tanggal', name: 'tanggal'},
                        {data: 'referensi', name: 'referensi'},
                        {data: 'total', name: 'total'},
                        {data: 'catatan', name: 'catatan'},
                        {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
                    ]
                });
            });


    //   $( function() {
    //     var availableTags =
    //       [

    //       ];
    //     $( "#kategori" ).autocomplete({
    //       source: availableTags
    //     });
    //   } );
    function searchProduk(id){
                    // $("#klik-kartu").prop('disabled', true);
                    // $('#klik-kartu').bind('click');
                    // $('#data_kartu *[onclick]').removeAttr('onclick');
                    $('*[onclick]').prop('disabled',true);
                    $('*[data-toggle="modal"]').prop('disabled',true)
                        // $($(this).data('target')).toggleClass('in');


                    formAdd++;

                    var url = "{{ route('Pos.produk', ':id') }}".replace(':id', id);
                    var html = `
                    <tr id="trTable_`+formAdd+`" class="bg-gradient-danger">
                                                        <td text-align: left;">
                                                            <input type="text" class="searchProduk" id="produk_id`+formAdd+`" name="produk_id[]" hidden>
                                                            <input type="text" id="produkKode_`+formAdd+`" hidden>
                                                            <input type="text" id="produk_`+formAdd+`" name="produk_[]" class="searchProduk" style="width:160px;" readonly>

                                                        </td>
                                                        <td>
                                                            <input type="text"  id="biaya_satuan_`+formAdd+`" class="searchProduk" style="width:70px;" float: right;" name="biaya_satuan[]" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" id="kuantitas_`+formAdd+`" onkeyup="hitungKuantitas(`+formAdd+`)" class="searchProduk" style="width:30px;" text-align: center;" name="kuantitas[]">
                                                        </td>
                                                        <td>
                                                            <input type="text"  id="sub_total_`+formAdd+`"  class="searchProduk" style="width:70px;" float: right; border: none;" name="sub_total[]" readonly>
                                                        </td>
                                                        <td>

                                                            <a href='#' id="hapusTable_`+formAdd+`" onclick='hapusTable(`+formAdd+`)' title='Hapus data'><i class="icon-trash text-danger"></i>  </a>
                                                        </td>
                                                    </tr>

                    `;



                    $.get(url, function (res) {
                            var kuantitas = 1;

                            $('#appendd').append(html);//tambah item
                            $('#produk_id'+formAdd).val(res[0].id);//ambil id
                            $('#produkKode_'+formAdd).val(res[0].kode)
                            var p = $('#produk_'+formAdd).val(res[0].nama);//ambil nama
                            $('#biaya_satuan_'+formAdd).val(res[0].harga_jual);//ambil biaya
                            $('#kuantitas_'+formAdd).val(kuantitas);//ambil kuantitias
                            var subTotal = kuantitas*res[0].harga_jual;
                            $('#sub_total_'+formAdd).val(subTotal);//subtotal

                            var total = $('#tabelTotal').html();//ambil total lama
                            total = parseInt(total) + parseInt(subTotal);//total lama + sub total produk baru
                            $('#tabelTotal').html(total);

                            produkSesudah = $("#produk_"+formAdd).val();

                            tr = $("#appendd tr").length;

                            for (i = 1; i < tr; i++) {
                                console.log('i'+i)
                                produkSebelum = $("#produk_"+i).val();
                                console.log('2:'+produkSebelum);
                                var qty = $('#kuantitas_'+i).val();
                                console.log('qty:'+qty);
                                if(produkSebelum == produkSesudah && qty>0){
                                        console.log('i='+i);
                                        qty++;
                                        $('#kuantitas_'+i).val(qty);
                                        console.log('formAdd3:'+formAdd);
                                        var subTotal = qty*res[0].harga_jual;
                                        $('#sub_total_'+i).val(subTotal);
                                        console.log('subsebelum',total)
                                        // total = parseInt(total) + parseInt(subTotal);
                                        // console.log('totatambah',total)
                                        $('#tabelTotal').html(total);
                                        $("#trTable_"+formAdd).remove();
                                }else{
                                    $('#kuantitas_'+formAdd).val(kuantitas);
                                    var subTotal = kuantitas*res[0].harga_jual;
                                    $('#sub_total_'+formAdd).val(subTotal);
                                }
                            }

                            // total item
                            trItem = $('#appendd tr').length
                            $('#totalItems').html(trItem)

                            // diskon
                            var diskon = $('#nilaiDiskon').html();
                            var total = $('#tabelTotal').text();
                            hasilDiskon = total * diskon / 100 ;
                            $('#hasilDiskon').html(hasilDiskon);
                            bayar = total - hasilDiskon + parseFloat(hasilPajak);
                            $('#totalPayable').html(bayar);

                            var pajak = $('#nilaiPajak').html();
                            var total = $('#tabelTotal').text();
                            hasilDiskon = $('#hasilDiskon').html();
                            hasilPajak = total * pajak / 100;
                            $('#hasilPajak').html(hasilPajak);
                            bayar = parseFloat(total - hasilDiskon) + parseFloat(hasilPajak);
                            $('#totalPayable').html(bayar);

                            $('*[onclick]').prop('disabled',false);
                            $('*[data-toggle="modal"]').prop('disabled',false)

                            // produkSesudah =
                            // if()

                            // penjumlahan

                    }, 'JSON').done(function () {
                            console.log('Done');
                    }).fail(function(e){
                            console.log('Error');
                    });
                };
    </script>
@stack('script')
@endsection

