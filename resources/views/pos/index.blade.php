@extends('layouts.app')
@section('title', ' | '.$title.'')
@section('style')
<style>
    .product-card {
        position: static;
        width: auto;
        height: 390px;
    }

    .product-nav{
        position: relative;
        height: 10px;
    }
</style>
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
            <div class="card col-md-5 h-100">
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
                            <input class="form-control" type="text" id="kategori" placeholder="Search product by code or name, you can scan barcode too">
                            {{-- <ul class="list-group">
                                @foreach ($kategori as $k)
                                <li class="list-group-item">{{$k->nama}}</li>
                                @endforeach
                            </ul> --}}
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
    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Items</th>
                                    <th>0</th>
                                    <th>Total</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <th>0</th>
                                    <th>Order Tax</th>
                                    <th>0</th>
                                </tr>
                                <tr>
                                    <th>Total Payable</th>
                                    <th>0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary h-50">Hold</a>
                            <a href="" class="btn btn-primary h-50">Print Order</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-danger h-50">Cancel</a>
                            <a href="" class="btn btn-primary h-50">Print Bill</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-success py-4">Payment</a>
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
                        <span>
                            <img src="{{asset($path.$k->gambar)}}" alt=""  width="40" height="80">
                        </span>
                        <br>
                        <span class="">
                            <span>{{$k->nama}}</span>
                        </span>
                    </button>
                    @endforeach
                </div>
                <div class="product-nav row text-white">
                    <a class="btn btn-secondary col-md-4 font-weight-bold"><</a>
                    <button class="btn btn-success col-md-4 font-weight-bold" data-toggle="modal" data-target="#myModal">
                        <i class="icon icon-folder"></i>Sell Gift Card
                    </button>
                    {{-- modal --}}
                    <a class="btn btn-secondary col-md-4 font-weight-bold">></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
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
            <label for="nomorKartu">Card No</label>
             <input class="form-control" type="text" value="" id="nomorKartu" name="nomorKartu">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $("#nomorKartu").attr('maxlength','16');
            // limit nomor kartu
            $("#nomorKartu").keypress(function (e) {
                if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
            });

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

