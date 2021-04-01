@extends('layouts.app')
@section('title', ' | Edit Kategori')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT KATEGORI
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Kategori.daftarkategori.update', $Kategori->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Kategori->id}}"/>
                    <h4 id="formTitle">Edit Kategori</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-8">
                                <label for="kode">Kode</label>
                                <input type="textarea" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="masukan kode" name="kode" value="{{ $Kategori->kode }}" maxlength="4" required>
                                @error('kode')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-8">
                                <label for="nama">Nama</label>
                                <input type="textarea" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama" value="{{ $Kategori->nama }}" required>
                                @error('nama')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group m-0 col-md-8">
                                <label for="gambar" class="col-form-label s-12 col-md-2">
                                    Gambar
                                    <a class="ml-1 mt-1" data-toggle="popover" title="Required" data-html="true" data-content="Max File: 2MB<br/>Format File: (png, jpg, jpeg)<br/>Width: 500 pixel<br/>Height: 500 pixel">
                                        <i class="icon icon-information2 s-18 red-text"></i>
                                    </a>
                                </label>
                                <input type="file" name="gambar" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')">
                                <label for="file" class="btn-tertiary js-labelFile col-md-6">
                                    <i class="icon icon-image mr-2 m-b-1"></i>
                                    <span id="changeText" class="js-fileName" >Browse Image</span>
                                </label>
                            </div> --}}
                            <div class="form-group m-0 col-md-8">
                                <label for="gambar" class="col-form-label s-12 col-md-2">Foto</label>
                                <input type="file" name="gambar" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')">
                                <label for="file" class="btn-tertiary js-labelFile col-md-12">
                                    <i class="icon icon-image mr-2 m-b-1"></i>
                                    <span class="js-fileName">Browse Image</span>
                                </label>
                            </div>
                            <div class="form-group m-0">
                                <label class="col-form-label s-12 col-md-2"></label>
                                @if ($Kategori->gambar != null)
                                <img id="result" width="150" src="{{config('app.sftp_src').'images/' . $Kategori->gambar}}" class="rounded img-fluid mt-2" alt=""/>
                                @else
                                <img id="result" width="150" src="{{ asset('images/404.png') }}" class="rounded img-fluid mt-2" alt=""/>
                                @endif
                            </div>
                            <div class="form-group m-0">
                                <label class="col-form-label s-12 col-md-2"></label>
                                <img width="150" class="rounded img-fluid mt-2 mb-2" id="preview" alt=""/>
                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Update<span id="txtAction"></span></button>
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
                            action: reset()

                        }
                    }
                });
            }
        }
    }

    function reset(){
        $('#form').trigger('reset');
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
    }



 </script>

@endsection
