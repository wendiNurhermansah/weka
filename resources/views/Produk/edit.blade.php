@extends('layouts.app')
@section('title', 'EDIT')
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
                <form method="POST" action="/product/{{ $produk->id }}">
                    @method('patch')
                    @csrf

                        <div class="form-group">
                            <label for="ketik">Ketik</label>
                            <select class="custom-select @error('ketik') is-invalid @enderror" id="ketik" placeholder="Masukkan ketik" name="ketik" value="{{$produk -> ketik}}">
                                <option selected>Standar</option>
                                <option value="1">Combo</option>
                                <option value="2">Layanan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$produk->nama}}">
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select @error('kategori') is-invalid @enderror" id="kategori" placeholder="Masukkan kategori" name="kategori" value="{{$produk -> kategori}}">
                                <option selected>Makanan</option>
                                <option value="1">Minuman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kuantitas">Kuantitas</label>
                            <input type="text" class="form-control @error('kuantitas') is-invalid @enderror" id="kuantitas" placeholder="Masukkan kuantitas" name="kuantitas" value="{{$produk -> kuantitas}}">
                        </div>

                        <div class="form-group">
                            <label for="pajak">Pajak</label>
                            <input type="text" class="form-control @error('pajak') is-invalid @enderror" id="pajak" placeholder="Masukkan pajak" name="pajak" value="{{$produk -> pajak}}">
                        </div>

                        <div class="form-group">
                            <label for="metode">Metode</label>
                            <input type="text" class="form-control @error('metode') is-invalid @enderror" id="metode" placeholder="Masukkan metode" name="metode" value="{{$produk -> metode}}">
                        </div>

                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="Masukkan biaya" name="biaya" value="{{$produk -> biaya}}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga" name="harga" value="{{$produk -> harga}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>



</div>
@endsection
