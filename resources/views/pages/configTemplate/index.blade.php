@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-paper-plane mr-2"></i>
                           List {{ $title }}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce my-3">
        <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <th width="30">No</th>
                                        <th>Logo</th>
                                        <th>Logo Title</th>
                                        <th>Logo Auth</th>
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
                            <form class="needs-validation" id="form" method="POST" enctype="multipart/form-data" novalidate>
                                {{ method_field('POST') }}
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Tambah Data</h4><hr>
                                <div class="form-row form-inline">
                                    <div class="col-md-12">
                                        <div class="form-group m-t-7">
                                            <label for="" class="col-form-label s-12 col-md-4">Logo</label>
                                            <input type="file" name="logo" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')">
                                            <label for="file" class="btn-tertiary js-labelFile col-md-8">
                                                <i class="icon icon-image mr-2 m-b-1"></i>
                                                <span id="changeText" class="js-fileName">Browse Image</span>
                                            </label>
                                            <img id="result" class="d-none" width="150">
                                            <hr>
                                            <img width="150" class="rounded img-fluid m-l-240 mt-1 mb-1" id="preview" alt=""/>
                                        </div>
                                        @include('pages.configTemplate.input1')
                                        @include('pages.configTemplate.input2')                                                                          
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
</div>
@endsection
@section('script')
<script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route($route.'api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'logo', name: 'logo'},
            {data: 'logo_title', name: 'logo_title'},
            {data: 'logo_auth', name: 'logo_auth'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    (function () {
        'use strict';
        $('.input-file').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                    .removeClass('has-file').html(labelVal);
            });
        });
    })();

    function tampilkanPreview(gambar, idpreview) {
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                $.confirm({
                    title: '',
                    content: 'Tipe file tidak boleh! haruf format gambar (png, jpg)',
                    icon: 'icon icon-close',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: "ok!",
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: add()
                        }
                    }
                });
            }
        }
    }

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#result').attr({ 'src': '-', 'alt': ''});
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#result1').attr({ 'src': '-', 'alt': ''});
        $('#preview1').attr({ 'src': '-', 'alt': ''});
        $('#result2').attr({ 'src': '-', 'alt': ''});
        $('#preview2').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
        $('#changeText1').html('Browse Image')
        $('#changeText2').html('Browse Image')
        $('#reset').show();
    }

    add();
    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            // $('#action').attr('disabled', true);
            url = (save_method == 'add') ? "{{ route($route.'store') }}" : "{{ route($route.'update', ':id') }}".replace(':id', $('#id').val());
            $.ajax({
                url : url,
                type : (save_method == 'add') ? 'POST' : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    table.api().ajax.reload();
                    location.reload();
                    if(save_method == 'add') add();    
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
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
        $.get("{{ route($route.'edit', ':id') }}".replace(':id', id), function(data){
            $('#id').val(data.id);
            var path = "{{$path}}"+data.logo;
            $('#result').attr({'src': path, 'class': 'img-fluid mt-2 mb-2', 'style': 'margin-left: 50%'});
            $('#changeText').html('Change Image')
            var path1 =  "{{$path}}"+data.logo_title;
            $('#result1').attr({'src': path1, 'class': 'img-fluid m-l-240 mt-2 mb-2', 'style': 'margin-left: 50%'});
            $('#changeText1').html('Change Image')
            var path2 =  "{{$path}}"+data.logo_auth;
            $('#result2').attr({'src': path2, 'class': 'img-fluid m-l-240 mt-2 mb-2', 'style': 'margin-left: 50%'});
            $('#changeText2').html('Change Image')
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