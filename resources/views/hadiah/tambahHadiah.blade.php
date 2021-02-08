@extends('layouts.app')
@section('title', ' | Tambah kartu Hadiah')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-payment mr-1"></i>
                        TAMBAH KARTU HADIAH
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
                    <h4 id="formTitle">Tambah Kartu Hadiah</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="card">Card No</label>
                                <input type="text" class="form-control @error('card') is-invalid @enderror"  maxlength="16" id="card" placeholder="" name="card" value="{{ old('card') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="nilai">Nilai</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" placeholder="" name="nilai" value="{{ old('nilai') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kedaluwarsa">Tanggal Kedaluwarsa</label>
                                <input type="date" class="form-control @error('kedaluwarsa') is-invalid @enderror" id="kedaluwarsa" placeholder="" name="kedaluwarsa" value="{{ old('kedaluwarsa') }}" required>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary" id="action">Tambah Kartu Hadiah<span id="txtAction"></span></button>

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
            url = "{{ route('Hadiah.hadiah.store') }}",
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

