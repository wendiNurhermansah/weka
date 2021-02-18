@extends('layouts.app')
@section('title', ' | Tambah Biaya')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-money mr-1"></i>
                        TAMBAH BIAYA
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" id="form" method="POST"  novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Tambah Biaya</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="tanggal">Tanggal</label>
                                <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{ old('tanggal') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="referensi">Referensi</label>
                                <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" placeholder="" name="referensi" value="{{ old('referensi') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="{{ old('jumlah') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="dibuat">Dibuat Oleh</label>
                                <input type="text" class="form-control @error('dibuat') is-invalid @enderror" id="dibuat" placeholder="" name="dibuat" value="{{ old('dibuat') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="catatan">Catatan</label>
                                <textarea name="catatan" id="catatan" cols="30" rows="10" required></textarea>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary btn-sm" id="action">Tambah Biaya<span id="txtAction"></span></button>
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
        tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });

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
    }



    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('Pembelian.biaya.store') }}",
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

