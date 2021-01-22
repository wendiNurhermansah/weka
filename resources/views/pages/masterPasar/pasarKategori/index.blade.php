@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-local_convenience_store mr-2"></i>
                        List {{ $title }}
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
                                    <th>Pasar</th>
                                    <th>Jenis Lapak</th>
                                    <th>Luas</th>
                                    <th>Ukuran</th>
                                    <th>Blok</th>
                                    <th>Retribusi</th>
                                    <th>Jumlah</th>
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
                        <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                            {{ method_field('POST') }}
                            <input type="hidden" id="id" name="id"/>
                            <h4 id="formTitle">Tambah Data</h4><hr>
                            <div class="form-row form-inline">
                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        <label class="col-form-label s-12 col-md-4">Pasar</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="tm_pasar_id" id="tm_pasar_id" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach ($pasar as $i)
                                                    <option value="{{ $i->id }}">{{ $i->nm_pasar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label class="col-form-label s-12 col-md-4">Jenis Lapak</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="tm_jenis_lapak_id" id="tm_jenis_lapak_id" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach ($jenisLapak as $i)
                                                    <option value="{{ $i->id }}">{{ $i->nm_jenis_lapak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label for="luas" class="col-form-label s-12 col-md-4">Luas</label>
                                        <input type="number" name="luas" id="luas" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="nm_blok" class="col-form-label s-12 col-md-4">Nama Blok</label>
                                        <input type="text" name="nm_blok" id="nm_blok" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="ukuran" class="col-form-label s-12 col-md-4">Ukuran</label>
                                        <input type="text" name="ukuran" id="ukuran" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="retribusi" class="col-form-label s-12 col-md-4">Retribusi</label>
                                        <input type="text" name="retribusi" id="retribusi" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="jumlah" class="col-form-label s-12 col-md-4">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
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
        pageLength: 15,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route($route.'api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'tm_pasar_id', name: 'tm_pasar_id'},
            {data: 'tm_jenis_lapak_id', name: 'tm_jenis_lapak_id'},
            {data: 'luas', name: 'luas'},
            {data: 'ukuran', name: 'ukuran'},
            {data: 'nm_blok', name: 'nm_blok'},
            {data: 'retribusi', name: 'retribusi'},
            {data: 'jumlah', name: 'jumlah'},
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
        $('#tm_pasar_id').val("");
        $('#tm_pasar_id').trigger('change.select2');
        $('#tm_jenis_lapak_id').val("");
        $('#tm_jenis_lapak_id').trigger('change.select2');
        $('#luas').focus();
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
            url = (save_method == 'add') ? "{{ route($route.'store') }}" : "{{ route($route.'update', ':id') }}".replace(':id', $('#id').val());
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
        $('#txtAction').html("Perubahan");
        $('#reset').hide();
        $('input[name=_method]').val('PATCH');
        $.get("{{ route($route.'edit', ':id') }}".replace(':id', id), function(data){
            $('#id').val(data.id);
            $('#luas').val(data.luas).focus();
            $('#ukuran').val(data.ukuran);
            $('#retribusi').val(data.retribusi);
            $('#jumlah').val(data.jumlah);
            $('#nm_blok').val(data.nm_blok);
            $('#tm_pasar_id').val(data.tm_pasar_id);
            $('#tm_pasar_id').trigger('change.select2');
            $('#tm_jenis_lapak_id').val(data.tm_jenis_lapak_id);
            $('#tm_jenis_lapak_id').trigger('change.select2');
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
                        $.post("{{ route($route.'destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
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
