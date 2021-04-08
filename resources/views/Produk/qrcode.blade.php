@extends('layouts.app')
@section('title', '| QR Code')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-store_mall_directory"></i>
                        QR CODE
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session ('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <th width="30">NO</th>
                            <th width='75'>Gambar</th>
                            <th>Nama</th>
                            <th width='100'>QR Code</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 30px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img id="photo_" alt="">
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
        url: "{{ route('product.api') }}",
        method: 'POST'
    },

    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
        {data: 'gambar', name: 'gambar'},
        {data: 'nama', name: 'nama'},
        {data: 'qr_code', name: 'qr_code'},
        ]
    });

    //modal gambar
    function show(id){
        $('#modal2').modal('show');
        $.get("{{ route('product.showDataModal', ':id') }}".replace(':id', id), function(data){
            var path = "{{ config('app.sftp_src').'images' }}"+ "/" + data.gambar;
            console.log(data.gambar)
            $('#photo_').attr({'src': path});
        }, "JSON").fail(function(){
            reload();
        });
    }
</script>

@endsection



