@extends('layouts.app')
@section('title', ' | '.$title.'')
@section('style')
<style>
    .product-card {
        position: ;
        width: auto;
        height: 460px;
    }
    .product-nav{
        position: ;
        height: 10px;
    }
    .button-footer{
        width: 100px;
    }
</style>
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
@endsection
@section('content')
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
                        <select class="form-control" id="">
                            @foreach ($pelanggan as $p)
                                <option value="{{$p->nama}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                        <a class="btn border"><i class="icon icon-add"></i></a>
                    </div>
                    <div class="form-group">
                        <input type="text" id="note" name="note" class="form-control" placeholder="Rerefence Note">
                    </div>
                    <div class="form-group">
                            <input class="form-control" type="text" id="kategori" onclick="" placeholder="Search product by code or name, you can scan barcode too">
                    </div>
                    <div class="form-group">
                        <table>
                            <thead>
                                <tr>
                                    <th>product</th>
                                    <th>price</th>
                                    <th>qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td></td>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Items</th>
                                    <th>0</th>
                                    <th>Total</th>
                                    <th><span id="tabelTotal"></span></th>
                                </tr>
                                <tr>
                                    <th><a data-toggle="modal" data-target="#modalDiskon" class="text-primary">Discount</a></th>
                                    <th>(<span id="nilaiDiskon"></span>)<span id="hasilDiskon"></span></th>
                                    <th><a data-toggle="modal" data-target="#modalPajak" class="text-primary">Order Tax</a></th>
                                    <th>(<span id="nilaiPajak"></span>)<span id="hasilPajak"></span></th>
                                </tr>
                                <tr>
                                    <th>Total Payable <a data-toggle="modal" data-target="#catatan"><i class="text-primary icon-comment"></i></a></th>
                                    <th class="text-right"><span id="totalPayable"></span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row mt-5 pt-5">
                        <div class="col-md-4">
                            <button href="" class="btn btn-warning button-footer" data-toggle="modal" data-target="#hold">Hold</button>
                            <button href="" class="btn btn-danger button-footer" data-toggle="modal" data-target="#cancel">Cancel</button>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary h-50 button-footer" data-toggle="modal" data-target="#printOrder">Print Order</a>
                            <a href="" class="btn btn-dark h-50 button-footer">Print Bill</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-success py-4 button-footer">Payment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="product-card">
                    {{-- <div class="row">
                    @foreach ($kartu as $k)
                        <div class="col-md-2">
                            <div class="card text-center">
                                <img class="card-img-top" src="{{asset($path.$k->gambar)}}" alt="" width="40" height="80">
                                <div class="card-body">
                                  <p class="card-title"><small>{{$k->nama}}</small></p>
                                  <p class="card-text"><small>harga</small></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div> --}}
                    @foreach ($kartu as $k)
                    <button type="button" class="col-md-2 btn btn-light m-1">
                        <div class="col-md-12">
                            <img src="{{asset($path.$k->gambar)}}" alt=""  width="40" height="80">
                        </div>
                        <div class="col-md-4">
                            {{$k->nama}}
                        </div>
                        
                        <br>
                    </button>
                    @endforeach
                </div>
                <div class="product-nav row text-white">
                    
                    <a href="{{ $kartu->previousPageUrl() }}" class="btn btn-secondary col-md-4 font-weight-bold"><</a>
                    <button class="btn btn-success col-md-4 font-weight-bold" data-toggle="modal" data-target="#hadiah">
                        <i class="icon icon-folder"></i>Sell Gift Card
                    </button>
                    {{-- modal --}}
                    <a href="{{ $kartu->nextPageUrl() }}" class="btn btn-secondary col-md-4 font-weight-bold">></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hadiah" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="text-black modal-title"><i class="icon icon-folder"></i>  Sell Gift Card</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Please fill in the information below</p>
          <div class="form-group">
            <label for="nomorKartu" class="font-weight-bold">Card No</label>
             <input class="form-control" type="text" value="" id="nomorKartu" name="nomorKartu">
             <button type="button" onclick="randomNomorKartu()" class="btn btn-secondary">&#9762;</button>
          </div>
          <div class="form-group">
            <label for="nilai" class="font-weight-bold">Value</label>
             <input class="form-control" type="text" value="" id="nilai" name="nilai">
          </div>
          <div class="form-group">
            <label for="harga" class="font-weight-bold">Price</label>
             <input class="form-control" type="number" value="" id="harga" name="harga">
          </div>
          <div class="form-group">
            <label for="tanggalKedaluwarsa" class="font-weight-bold">Expiry Date</label>
             <input class="form-control" type="date" value="" id="tanggalKedaluwarsa" name="tanggalKedaluwarsa">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>

    </div>
</div>
<div class="modal fade" id="hold" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Suspend Sale</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Type Reference Note</p>
                <div class="form-group">
                    <label for="note" class="font-weight-bold">Reference Note</label>
                    <input class="form-control" type="text" value="" id="note" name="note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="catatan" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Note</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" value="" id="note" name="note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
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
<div class="modal fade" id="printOrder" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Print Order</h4>
                <button type="button" class="btn btn-light" data-dismiss="modal">PRINT</button>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-center my-4">
                    <h4 class="text-black modal-title font-weight-bold">Simple POS</h4>
                    <p class="text-black modal-title">Order</p>
                </div>
                <div class="form-group">
                    <label for="customer" class="">C : </label>
                    <label for="getCustomter" class=""></label>
                </div>
                <div class="form-group">
                    <label for="note" class="">R : </label>
                    <label for="getNote" class=""></label>
                </div>
                <div class="form-group">
                    <label for="pelayan" class="">U : </label>
                    <label for="getPelayan" class=""></label>
                </div>
                <div class="form-group">
                    <label for="date" class="">T : </label>
                    <label for="getDate" class="">{{ date('D d M Y h:i A') }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="shortcut" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Shortcut Key</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Shortcut Keys</th>
                        <th>Actions</th>
                    </thead>
                  </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Register Details (Opened at: {{ date('d F Y h:i A') }})</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Cash in hand :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Cash Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Cheque Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Gift Card Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Credit Card :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Stripe :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Others :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Total Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Expenses :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Total Cash :</th>
                            <th class="text-right">0000</th>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="penjualanHariIni" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Today's Sale ({{ date('D d M Y') }})</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Cash Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Cheque Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Credit Card :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Gift Card Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Stripe :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Others :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Total Cash :</th>
                            <th class="text-right">0000</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tutupDaftar" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Register Details (Opened at: {{ date('d F Y h:i A') }})</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Cash Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Cheque Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Credit Card :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Gift Card Sales :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Stripe :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Others :</th>
                            <th class="text-right">0000</th>
                        </tr>
                        <tr>
                            <th>Total Cash :</th>
                            <th class="text-right">0000</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDiskon" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action=""></form>
        <div class="modal-content w-50 mx-auto">
            <div class="modal-header">
                <h4 class="text-black modal-title">Discount (5 or 5%)</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="inputDiskon" name="inputDiskon" class="form-control" placeholder="" value="0" onclick="">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input border rounded-circle" type="checkbox" id="orderTotal" value="orderTotal">
                    <label class="form-check-label" for="orderTotal">Apply to order total</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="allOrder" value="allOrder">
                    <label class="form-check-label" for="allOrder">Apply to all order items</label>
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateDiskon()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPajak" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content w-50 mx-auto">
            <div class="modal-header">
                <h4 class="text-black modal-title">Tax (5 or 5%)</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="inputPajak" name="inputPajak" class="form-control" value="5%" placeholder="">
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updatePajak()">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        // diskon
        
        function updateDiskon()
        {
            var diskon = $('#inputDiskon').val();
            $('#nilaiDiskon').html(diskon);
            var total = $('#tabelTotal').text();
            100  
            hasilDiskon = total * diskon / 100 ;
            // 10
            $('#hasilDiskon').html(hasilDiskon);
            // 10
            var nilaiPajak = $('#nilaiPajak').text();
            // 1%
            hasilPajak = (total - hasilDiskon) * nilaiPajak / 100 ;
                            // (100 - 10) * 1% = 9
                                // 90
            $('#hasilPajak').html(hasilPajak);
            // 9
            bayar = total - hasilDiskon + parseFloat(hasilPajak);
            $('#totalPayable').html(bayar);
            $('#modalDiskon').modal('toggle');
            $('#inputDiskon').val('0');
            
            // return hasilDiskon;
        }

        // pajak
        function updatePajak()
        {
            var pajak = $('#inputPajak').val();
            $('#nilaiPajak').html(pajak);
            var total = $('#tabelTotal').text();  
            hasilPajak = total * pajak / 100;
            $('#hasilPajak').html(hasilPajak);
            var hasilDiskon = $('#hasilDiskon').text();
            bayar = total - hasilDiskon + parseFloat(hasilDiskon);
            $('#totalPayable').html(bayar);
            $('#modalPajak').modal('toggle');
            $('#inputPajak').val('5%');

            // return hasilPajak;
        }

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function randomNomorKartu() {
            var random = Math.floor((Math.random() * 10000000000000000) + 1);
            $('#nomorKartu').val(random);
        }

        function tambahProduk() {
        }

        $(document).ready(function(){
            // total
            $("#tabelTotal").html(90);

            // totalPayable
            $("#totalPayable").html('0');

            // nav
            $("#pos-nav-li").remove();
            // $("#navigasi").add("<li id='shortcut-nav-li' type='none' class='mx-2 fs-13 text-white'><a id='shortcut' href='' data-toggle='modal' data-target='#shortcut'><i class='icon-key'></i></a></li>").appendTo("#navigasi");
            $("#nomorKartu").attr('maxlength','16');
            // limit nomor kartu

            // no.card
            $("#nomorKartu").keypress(function (e) {
                if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
            });

            // diskon
            $("#inputDiskon").keypress(function (e) {
                if (String.fromCharCode(e.keyCode).match(/[^0-9-%]/g)) return false;
            });
            $("#nilaiDiskon").html('0');
            $("#hasilDiskon").html('0');

            // pajak
            $("#inputPajak").keypress(function (e) {
                if (String.fromCharCode(e.keyCode).match(/[^0-9-%]/g)) return false;
            });

            $("#nilaiPajak").html(5);
            nilaiPajak = $("#nilaiPajak").text();
            var total = $('#tabelTotal').text();
            hasilPajak = total * nilaiPajak / 100
            $("#hasilPajak").html(hasilPajak);
            var bayar = parseFloat(total) + parseFloat(hasilPajak);
            $('#totalPayable').html(bayar);
            
            // ajax get product
            $( "#kategori" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                    url:"{{route('Pos.kategori')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#kategori').val(ui.item.label); // display the selected text
                    return false;
                }
            });
        });

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



//   $( function() {
//     var availableTags =
//       [

//       ];
//     $( "#kategori" ).autocomplete({
//       source: availableTags
//     });
//   } );


</script>
@endsection

