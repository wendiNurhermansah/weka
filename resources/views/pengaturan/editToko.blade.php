@extends('layouts.app')
@section('title', ' | Edit Toko')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT TOKO
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Kategori.toko.update', $Toko->id) }}" method="POST" >
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Toko->id}}"/>
                    <h4 id="formTitle">Edit Toko</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama Toko" name="nama" value="{{ $Toko->nama }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="masukan kode" name="kode" value="{{ $Toko->kode }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="masukan telepon" name="telepon" value="{{ $Toko->telepon }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukan email" name="email" value="{{ $Toko->email }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="alamat">Alamat 1</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="masukan alamat" name="alamat" value="{{ $Toko->alamat }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" placeholder="masukan kota" name="kota" value="{{ $Toko->kota }}" required>

                            </div>


                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
