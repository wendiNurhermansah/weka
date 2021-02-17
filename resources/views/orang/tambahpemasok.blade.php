@extends('layouts.app')
@section('title', ' | Tambah Pemasok')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-1"></i>
                        TAMBAH PEMASOK
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
                    <h4 id="formTitle">Tambah Pemasok</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama depan" name="nama" value="{{ old('nama') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="masukan no telepon" name="telepon" value="{{ old('telepon') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukan email" name="email" value="{{ old('email') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="ccf_1">Customer Custom field 1</label>
                                <input type="text" class="form-control @error('ccf_1') is-invalid @enderror" id="ccf_1" placeholder="" name="ccf_1" value="{{ old('ccf_1') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="ccf_2">Customer Custom field 2</label>
                                <input type="text" class="form-control @error('ccf_2') is-invalid @enderror" id="ccf_2" placeholder="" name="ccf_2" value="{{ old('ccf_2') }}" required>

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
            url = "{{ route('Orang.pemasok.store') }}",
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

