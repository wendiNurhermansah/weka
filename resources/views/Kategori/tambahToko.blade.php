@extends('layouts.app')
@section('title', ' | Tambah Toko')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-1"></i>
                        TAMBAH TOKO
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" id="form" method="POST"  novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Tambah Toko</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama Toko" name="nama" value="{{ old('nama') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="masukan kode" name="kode" value="{{ old('kode') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="masukan telepon" name="telepon" value="{{ old('telepon') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukan email" name="email" value="{{ old('email') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="alamat">Alamat 1</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="masukan alamat" name="alamat" value="{{ old('alamat') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" placeholder="masukan kota" name="kota" value="{{ old('kota') }}" required>

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
            url = "{{ route('Kategori.toko.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    location.reload();
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
