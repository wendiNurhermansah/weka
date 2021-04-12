@extends('layouts.app')
@section('title', '| Penjualan  ')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard"></i>
                        Daftar Penjualan
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        {{-- @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif --}}

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Pajak</th>
                            <th>Discount</th>
                            <th>Grand Total</th>
                            <th>Dibayar</th>
                            <th>Status</th>
                        <th width="60">Tindakan</th>
                        </thead>
                        <tbody></tbody>
                    </table>
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
            url: "{{ route('daftarpenjualan.api') }}",
            method: 'POST'
        },

        columns: [
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'created_at', name: 'created_at'},
            {data: 'pelanggan_id', name: 'pelanggan_id'},
            {data: 'total', name: 'total'},
            {data: 'pajak', name: 'pajak'},
            {data: 'diskon', name: 'diskon'},
            {data: 'grand_total', name: 'grand_total'},
            {data: 'dibayar', name: 'dibayar'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });


    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini?',
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
                        $.post("{{ route('daftarpenjualan.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){}
            }
        })
    }
</script>
@endsection


