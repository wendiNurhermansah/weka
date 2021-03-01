@extends('layouts.app')
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
    <a id="kategori-nav" data-toggle="" data-target="#nav-kategori"><i class="icon-file"></i></a>
</li>
@endsection
@section('content')
<aside id="nav-kategori" class="fixed float-right" data-toggle='nav-kategori'>
    <section class="">
        <div class=" mt-3 mb-3">
            <img src="{{asset('images/logo.png')}}" class="mx-auto d-block" width="100" alt="Logo Top">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
        </div>
    </section>
</aside>
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
                                    <th>(<span id="nilaiDiskon"></span>%)<span id="hasilDiskon"></span></th>
                                    <th><a data-toggle="modal" data-target="#modalPajak" class="text-primary">Order Tax</a></th>
                                    <th>(<span id="nilaiPajak"></span>%)<span id="hasilPajak"></span></th>
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
                            <a href="" class="btn btn-dark h-50 button-footer" data-toggle="modal" data-target="#bill">Print Bill</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-success py-4 button-footer" data-toggle="modal" data-target="#payment" onclick="payment()">Payment</a>
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

@stack('modal')
@endsection
@section('script')
<script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
@stack('script')
@endsection

