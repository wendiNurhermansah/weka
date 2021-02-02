@extends('layouts.app')
@section('title', ' | Edit Pegawai')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT PEGAWAI
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Orang.pegawai.update', $Pegawai->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Pegawai->id}}"/>
                    <h4 id="formTitle">Edit Pegawai</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" placeholder="masukan nama depan" name="nama_depan" value="{{ $Pegawai->nama_depan }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="nama_belakang">Nama Blekang</label>
                                <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" placeholder="masukan nama belakang" name="nama_belakang" value="{{ $Pegawai->nama_belakang }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukan email" name="email" value="{{ $Pegawai->email }}" required>

                            </div>
                            <div class="form-group col-md-10">
                                <label for="group">Group</label>
                                <div class="col-md-6 p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="group" id="group" autocomplete="off">
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="status">Status</label>
                                <div class="col-md-6 p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="status" id="status" autocomplete="off">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
