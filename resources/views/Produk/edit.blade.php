@extends('layouts.app')
@section('title', '| EDIT')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard"></i>
                        EDIT PRODUK
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div class="row">
            <div class="col-10">
                <form class="needs-validation" action="{{ route('product.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
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
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$produk->nama}}" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="custom-select @error('kategori_id') is-invalid @enderror" id="kategori_id" placeholder="Masukkan kategori" name="kategori_id" value="{{$produk->kategori_id}}" required>
                               @foreach ($kategori as $k)
                                <option value="{{$k->id}}" {{ $k->id == $produk->kategori_id  ? 'selected' : '' }}>{{$k->nama}} [{{$k->kode}}]</option>
                               @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga_pabrik">Harga Pabrik</label>
                            <input type="text" class="form-control @error('harga_pabrik') is-invalid @enderror" id="harga_pabrik" placeholder="Masukkan Harga Pabrik" name="harga_pabrik" value="{{$produk->harga_pabrik}}" required>
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Masukkan Discount" name="discount" value="{{$produk->discount}}" required>
                        </div>


                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukkan Harga Jual" name="harga_jual" value="{{$produk->harga_jual}}" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkas Stock" name="stock" value="{{$produk->stock}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>



</div>
@endsection

@section('script')
 <script type="text/javascript">
 $('#result').attr({
            'src': '{{config("app.sftp_src")}}'+"images/"+'{{$produk->gambar}}',
            'class': 'img-fluid mt-2 mb-2',
            'style': 'margin-left: 50%'
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

    // $('#form').on('submit', function (e) {
    //     if ($(this)[0].checkValidity() === false) {
    //         event.preventDefault();
    //         event.stopPropagation();
    //     }
    //     else{
    //         $('#alert').html('');
    //         url = "{{ route('product.store') }}",
    //         $.ajax({
    //             url : url,
    //             type : 'POST',
    //             data: new FormData(($(this)[0])),
    //             contentType: false,
    //             processData: false,
    //             success : function(data) {
    //                 console.log(data);
    //                 $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
    //                 add();
    //             },
    //             error : function(data){
    //                 err = '';
    //                 respon = data.responseJSON;
    //                 if(respon.errors){
    //                     $.each(respon.errors, function( index, value ) {
    //                         err = err + "<li>" + value +"</li>";
    //                     });
    //                 }
    //                 $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
    //             }
    //         });
    //         return false;
    //     }
    //     $(this).addClass('was-validated');
    // });
</script>
@endsection

