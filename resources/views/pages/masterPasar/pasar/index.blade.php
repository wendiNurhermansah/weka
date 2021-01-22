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
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Luas Area</th>
                                    <th>Jumlah Lapak</th>
                                    <th>Jumlah Pedagang</th>
                                    <th>Terpakai</th>
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
                                        <label for="nm_pasar" class="col-form-label s-12 col-md-4">Nama</label>
                                        <input type="text" name="nm_pasar" id="nm_pasar" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="luas_area" class="col-form-label s-12 col-md-4">Luas Area</label>
                                        <input type="text" name="luas_area" id="luas_area" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label class="col-form-label s-12 col-md-4">Provinsi</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_prov" id="id_prov" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach ($provinsi as $i)
                                                    <option value="{{ $i->id }}">{{ $i->n_provinsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label class="col-form-label s-12 col-md-4">Kabupaten/Kota</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_kab" id="id_kab" autocomplete="off">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label class="col-form-label s-12 col-md-4">Kecamatan</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_kec" id="id_kec" autocomplete="off">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label class="col-form-label s-12 col-md-4">Kelurahan</label>
                                        <div class="col-md-8 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="id_kel" id="id_kel" autocomplete="off">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-5">
                                        <label for="latitude" class="col-form-label s-12 col-md-4">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="longitude" class="col-form-label s-12 col-md-4">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
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
            {data: 'nm_pasar', name: 'nm_pasar'},
            {data: 'kd_pasar', name: 'kd_pasar'},
            {data: 'luas_area', name: 'luas_area'},
            {data: 'jumlah_lapak', name: 'jumlah_lapak'},
            {data: 'jumlah_pedagang', name: 'jumlah_pedagang'},
            {data: 'terpakai', name: 'terpakai'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    $('#id_prov').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kab').html(option);
            $('#id_kec').html(option);
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kab').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#id_kab').empty().html(option);

                    $("#id_kab").val($("#id_kab option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kab').html(option);
                    $('#id_kec').html(option);
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#id_kab').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kec').html(option);
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kec').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#id_kec').empty().html(option);

                    $("#id_kec").val($("#id_kec option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kec').html(option);
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#id_kec').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#id_kel').html(option);
            selectOnChange();
        }else{
            $('#id_kel').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#id_kel').empty().html(option);

                    $("#id_kel").val($("#id_kel option:first").val()).trigger("change.select2");
                }else{
                    $('#id_kel').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#id_prov').val("");
        $('#id_prov').trigger('change.select2');
        $('#id_kab').val("");
        $('#id_kab').trigger('change.select2');
        $('#id_kec').val("");
        $('#id_kec').trigger('change.select2');
        $('#id_kel').val("");
        $('#id_kel').trigger('change.select2');
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
