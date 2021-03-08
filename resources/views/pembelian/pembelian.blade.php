@extends('layouts.app')
@section('title', ' | Daftar Pembelian')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        DAFTAR PEMBELIAN
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

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
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
                </div>

            </div>
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Beli</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Tanggal</td>
                                    <td id="tanggal_"></td>
                                </tr>
                                <tr>
                                    <td>Referensi</td>
                                    <td id="referensi_"></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td id="catatan_"></td>
                                </tr>
                            </thead>

                        </table>

                        <table class="table" style="margin: 10px;">
                            <thead class="table-active">
                              <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Biaya Satuan</th>
                                <th scope="col">Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="_produk"></td>
                                <td id="_kuantitas"></td>
                                <td id="_biayaSatuan"></td>
                                <td id="_subTotal"></td>
                              </tr>
                            </tbody>
                            <tfoot class="table-active">
                                <tr>
                                  <th>Total</th>
                                  <th></th>
                                  <th></th>
                                  <th>
                                      <span id="_total"></span>
                                  </th>

                                </tr>
                            </tfoot>
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


        var table = $('#dataTable').dataTable({
            processing: true,
            serverSide: true,
            pageLength: 15,
            order: [ 0, 'asc' ],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            ajax: {
                url: "{{ route('Pembelian.pembelian.api') }}",
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



    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('Pembelian.pembelian.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }

    function list(id){
        $('#modal1').modal('show');
        $.get("{{ route('Pembelian.pembelian.showDataModal', ':id') }}".replace(':id', id), function(data){
            // produk
            


            console.log(data);
            $('#tanggal_').html(data[0].tanggal);
            $('#referensi_').text(data[0].referensi);
            $('#catatan_').html(data[0].catatan);
            
            for(var i=0;i<data[1].length;i++){
                // console.log(data[1][i])
                console.log(data[2][i])
                // $('#_produk').html(data[2][i].nama);
                // $('#_kuantitas').text(data[1][i].kuantitas);
                // // console.log('k='+kuantitas);
                // $('#_biayaSatuan').text(data[1][i].biaya_satuan);
                // // console.log('b='+biaya);
                // $('#_subTotal').text(data[1][i].sub_total);
            }

            // data[2].forEach(function(item){
            //     console.log(item);
            //     $('#_produk').html(item.nama);
            // });

            $('#_total').text(data[0].total);

        }, "JSON").fail(function(){
            reload();
        });
    }

</script>
@endsection

