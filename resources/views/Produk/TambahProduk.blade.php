@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard"></i>
                        TAMBAH PRODUK
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div class="row">
            <div class="col-10">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                              <label for="gambar">Gambar
                                <a class="ml-1 mt-1" data-toggle="popover" title="Required" data-html="true" data-content="Max File: 2MB<br/>Format File: (png, jpg, jpeg)<br/>Width: 500 pixel<br/>Height: 500 pixel">
                                <i class="icon icon-information2 s-18 red-text"></i>
                                </a>
                              </label>
                              <input type="file"  name="gambar" id="file" class="form-control-file" onchange="tampilkanPreview(this,'preview')">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Makanan" name="nama" value="{{old('nama')}}">
                        </div>

                        <div class="form-group">
                            <label for="produk">Kode</label>
                            <select class="custom-select" name="produk">
                                @foreach ($kategori as $i)
                                <option value="{{$i->id}}">{{$i->nama}} [{{$i->kode}}]</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga_pabrik">Harga Pabrik</label>
                            <input type="text" class="form-control @error('harga_pabrik') is-invalid @enderror" id="harga_pabrik" placeholder="Masukkan Kuantitas" name="harga_pabrik" value="{{old('harga_pabrik')}}">
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Masukkan Discount" name="discount">
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukkan Harga Jual" name="harga_jual">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkan Stock" name="stock">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>



</div>
@endsection
