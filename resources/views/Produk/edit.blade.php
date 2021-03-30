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
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$produk->nama}}">
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select @error('kategori_id') is-invalid @enderror" id="kategori" placeholder="Masukkan kategori" name="kategori_id" value="{{$produk->kategori_id}}">
                               @foreach ($kategori as $k)
                                <option value="{{$k->id}}" selected>{{$k->nama}}</option>
                               @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga_pabrik">Harga Pabrik</label>
                            <input type="text" class="form-control @error('harga_pabrik') is-invalid @enderror" id="harga_pabrik" placeholder="Masukkan Harga Pabrik" name="harga_pabrik" value="{{$produk->harga_pabrik}}">
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Masukkan Discount" name="discount" value="{{$produk->discount}}">
                        </div>


                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukkan Harga Jual" name="harga_jual" value="{{$produk->harga_jual}}">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkas Stock" name="stock" value="{{$produk->stock}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>



</div>
@endsection
