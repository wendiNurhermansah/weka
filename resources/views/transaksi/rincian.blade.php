@extends('layouts.app')
@section('title', ' | Rincian')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-box mr-1"></i>
                        Daftar Rincian Produk
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
                                    <th>Nama Produk</th>
                                    <th>Rincian Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
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
                                        <label class="col-form-label s-12 col-md-4">Nama Produk</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_jenis_produk" id="id_jenis_produk" autocomplete="off">
                                                <option value="">Pilih</option>
                                                    @foreach($JenisProduk as $i)
                                                    <option value="{{$i->id}}">{{$i->jenis_produk}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label for="rincian_produk" class="col-form-label s-12 col-md-4">Rincian Produk</label>
                                        <input type="text" name="rincian_produk" id="rincian_produk" placeholder="masukan rincian produk" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label for="harga" class="col-form-label s-12 col-md-4">Harga</label>
                                        <input type="text" name="harga" id="harga" placeholder="masukan harga" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label for="stok" class="col-form-label s-12 col-md-4">Stok</label>
                                        <input type="text" name="stok" id="stok" placeholder="masukan stok" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
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
            url: "{{ route('rincianProduk.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'id_jenis_produk', name: 'id_jenis_produk'},
            {data: 'rincian_produk', name: 'rincian_produk'},
            {data: 'harga', name: 'harga'},
            {data: 'stok', name: 'stok'},
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
            url = (save_method == 'add') ? "{{ route('rincianProduk.index') }}" : "{{ route('rincianProduk.update', ':id') }}".replace(':id', $('#id').val());
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
        $.get("{{ route('rincianProduk.edit', ':id') }}".replace(':id', id), function(data){
            $('#id').val(data.id);
            $('#id_jenis_produk').val(data.id_jenis_produk).focus();
            $('#rincian_produk').val(data.rincian_produk).focus();
            $('#harga').val(data.harga).focus();
            $('#stok').val(data.jenis_produk).focus();
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
                        $.post("{{ route('rincianProduk.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
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
