@extends('layouts.app')
@section('title', ' | Edit Pemasok')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT PEMASOK
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Orang.pemasok.update', $Pemasok->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Pemasok->id}}"/>
                    <h4 id="formTitle">Edit Pelanggan</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama depan" name="nama" value="{{ $Pemasok->nama }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="masukan no telepon" name="telepon" value="{{ $Pemasok->telepon }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukan email" name="email" value="{{ $Pemasok->email }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="ccf_1">Customer Custom field 1</label>
                                <input type="text" class="form-control @error('ccf_1') is-invalid @enderror" id="ccf_1" placeholder="" name="ccf_1" value="{{ $Pemasok->ccf_1 }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="ccf_2">Customer Custom field 2</label>
                                <input type="text" class="form-control @error('ccf_2') is-invalid @enderror" id="ccf_2" placeholder="" name="ccf_2" value="{{ $Pemasok->ccf_2 }}" required>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Ubah<span id="txtAction"></span></button>
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
