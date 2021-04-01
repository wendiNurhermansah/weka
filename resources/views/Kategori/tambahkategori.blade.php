@extends('layouts.app')
@section('title', ' | Tambah Kategori')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-1"></i>
                        TAMBAH KATEGORI
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <div id="alert"></div>
                <form class="needs-validation" id="form" method="POST" enctype="multipart/form-data" novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Tambah Kategori</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="validasiKode" class="form-group col-md-6">
                                <label for="kode">KODE</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="masukan kode 4 karakter" name="kode" value="{{ old('kode') }}"  maxlength="4" required>
                                @error('kode')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama" value="{{ old('nama') }}" size="20" required>
                                @error('nama')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group m-0 col-md-6">
                                <label for="gambar" class="col-form-label s-12 col-md-2">
                                    Gambar
                                    <a class="ml-1 mt-1" data-toggle="popover" title="Required" data-html="true" data-content="Max File: 2MB<br/>Format File: (png, jpg, jpeg)<br/>Width: 500 pixel<br/>Height: 500 pixel">
                                        <i class="icon icon-information2 s-18 red-text"></i>
                                    </a>
                                </label>
                                <input type="file" name="gambar" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')" size="60">
                                <label for="file" class="btn-tertiary js-labelFile col-md-12">
                                    <i class="icon icon-image mr-2 m-b-1"></i>
                                    <span id="changeText" class="js-fileName">Browse Image</span>
                                </label>
                                <img id="result" class="d-none" width="150">
                                <img width="150" class="rounded img-fluid m-l-100 mt-1 mb-1" id="preview"
                                            alt="" />
                            </div>



                            <div class="mt-2 col-md-8" style="">
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
@endsection

@section('script')
<script type="text/javascript">

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
        $('#result').attr({
        'src': '-',
        'alt': ''
        });
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
                    content: 'Tipe file tidak boleh! harus format gambar (png, jpg)',
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

    function reset(){
        $('#form').trigger('reset');
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browser Image')
    }

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#name').focus();
        $('#result').attr({
            'src': '-',
            'alt': ''
         });
         $('#changeText').html('Browse Image');
         $('#preview').attr({
        'src': '-',
        'alt': ''
        });
    }



    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('Kategori.daftarkategori.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    add();
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



    </script>
@endsection
