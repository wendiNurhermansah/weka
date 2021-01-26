@extends('layouts.app')
@section('title', ' | Transaksi')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-money mr-1"></i>
                        Daftar Transaksi
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Id Rincian</th>
                                    <th>nama Rincian</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Diskon</th>
                                    <th>Id Operator</th>
                                    <th>Nama Operator</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jenis Komsumen</th>
                                    <th width="60"></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="alert"></div>
                <div class="card no-b">
                    <div class="card-body">
                        <form class="needs-validation" id="form" method="POST" novalidate>
                            {{ method_field('POST') }}
                            <input type="hidden" id="id" name="id"/>
                            <h4 id="formTitle">Tambah Data </h4><hr>
                            <div class="form-row form-inline">
                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        <label class="col-form-label s-12 col-md-4">ID rincian</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_rincian_produk" id="id_rincian_produk" autocomplete="off">
                                                <option value="">Pilih</option>
                                                    @foreach($Rincian_produk as $i)
                                                    <option value="{{$i->id}}">{{$i->id}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="nama_rincian" class="col-form-label s-12 col-md-4">Nama Rincian</label>
                                        <input type="text" name="nama_rincian" id="nama_rincian" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>

                                    <div class="form-group m-0">
                                        <label for="qty" class="col-form-label s-12 col-md-4">Qty</label>
                                        <input type="text" name="qty" id="qty" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="harga" class="col-form-label s-12 col-md-4">Harga</label>
                                        <input type="text" name="harga" id="harga" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="total" class="col-form-label s-12 col-md-4">Total</label>
                                        <input type="text" name="total" id="total" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="diskon" class="col-form-label s-12 col-md-4">Diskon</label>
                                        <input type="text" name="diskon" id="diskon" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="id_operator" class="col-form-label s-12 col-md-4">Id operator</label>
                                        <input type="text" name="id_operator" id="id_operator" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="nama_operator" class="col-form-label s-12 col-md-4">Nama operator</label>
                                        <input type="text" name="nama_operator" id="nama_operator" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="tanggal_transaksi" class="col-form-label s-12 col-md-4">Tanggal Transaksi</label>
                                        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label class="col-form-label s-12 col-md-4">Jenis Komsumen</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="jenis_komsumen" id="jenis_komsumen" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="0">Member</option>
                                                <option value="1">Nonmember</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-2" style="margin-left: 34%">
                                        <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                        <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route('transaksi.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'id_rincian_produk', name: 'id_rincian_produk'},
            {data: 'nama_rincian', name: 'nama_rincian'},
            {data: 'qty', name: 'qty'},
            {data: 'harga', name: 'harga'},
            {data: 'total', name: 'total'},
            {data: 'diskon', name: 'diskon'},
            {data: 'id_operator', name: 'id_operator'},
            {data: 'nama_operator', name: 'nama_operator'},
            {data: 'tanggal_transaksi', name: 'tanggal_transaksi'},
            {data: 'jenis_komsumen', name: 'jenis_komsumen'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#name').focus();
    }

    add();
    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            $('#action').attr('disabled', true);
            url = (save_method == 'add') ? "{{ route('transaksi.index') }}" : "{{ route('transaksi.update', ':id') }}".replace(':id', $('#id').val());
            $.post(url, $(this).serialize(), function(data){
                $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                table.api().ajax.reload();
                if(save_method == 'add') add();
            }, "JSON").fail(function(data){
                err = ''; respon = data.responseJSON;
                $.each(respon.errors, function(index, value){
                    err += "<li>" + value +"</li>";
                });
                $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
            }).always(function(){
                $('#action').removeAttr('disabled');
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function edit(id) {
        save_method = 'edit';
        var id = id;
        $('#alert').html('');
        $('#form').trigger('reset');
        $('#formTitle').html("Edit Data <a href='#' onclick='add()' class='btn btn-outline-danger btn-xs pull-right ml-2'>Batal</a>");
        $('#txtAction').html(" Perubahan");
        $('#reset').hide();
        $('input[name=_method]').val('PATCH');
        $.get("{{ route('transaksi.edit', ':id') }}".replace(':id', id), function(data){
            $('#id').val(data.id);
            $('#id_rincian-produk').val(data.id_rincian-produk).focus();
            $('#nama_rincian').val(data.nama_rincian).focus();
            $('#qty').val(data.qty).focus();
            $('#harga').val(data.harga).focus();
            $('#total').val(data.total).focus();
            $('#diskon').val(data.diskon).focus();
            $('#id_operator').val(data.id_operator).focus();
            $('#nama_operator').val(data.nama_operator).focus();
            $('#tanggal_transaksi').val(data.tanggal_transaksi).focus();
            $('#jenis_komsumen').val(data.jenis_komsumen).focus();
        }, "JSON").fail(function(){
            reload();
        });
    }

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
                        $.post("{{ route('transaksi.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
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


</script>
@endsection
