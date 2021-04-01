@extends('layouts.app')
@section('title', '| Tambah Produk')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard"></i>
                        TAMBAH PRODUK
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div class="row">
            <div class="col-10">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
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

                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Makanan" name="nama" value="{{old('nama')}}">
                        </div>

                        <div class="form-group">
                            <label for="produk">Kode</label>
                            <select class="custom-select" name="kategori_id">
                                @foreach ($kategori as $i)
                                <option value="{{$i->id}}">{{$i->nama}} [{{$i->kode}}]</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga_pabrik">Harga Pabrik</label>
                            <input type="text" class="form-control @error('harga_pabrik') is-invalid @enderror" id="harga_pabrik" placeholder="Masukkan Kuantitas" name="harga_pabrik" value="{{old('harga_pabrik')}}">
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Masukkan Discount" name="discount">
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukkan Harga Jual" name="harga_jual">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkan Stock" name="stock">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Data</button>
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
                    console.log(element.src);
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
</script>
@endsection
