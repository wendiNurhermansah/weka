@extends('layouts.app')
@section('title', ' | Pengaturan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-gear mr-1"></i>
                        PENGATURAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Harap perbarui informasi di bawah ini</h6>
                {{-- main --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Nama situs</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Kode Pin</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Tel</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Pembulatan</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Bahasa</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Tampilkan Produk</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Tema</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Batas Tampilan Produk</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Gaya Tema </label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Display Keyboard</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Overselling</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Penambahan Barang </label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Nama situs</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Beberapa Toko</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Kategori Default</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Kode mata uang</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Pelanggan Default</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Tanda Terima Cetak Otomatis</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Timezone</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Format Tanggal</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Diskon Default</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Format Waktu</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Pajak Pesanan Default</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Email default</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Baris per halaman </label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                            <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                </div>
                {{-- barcode --}}
                <div class="bg-light p-4 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Baris per halaman </label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Baris per halaman </label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Baris per halaman </label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                                <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- email --}}
                <div class="bg-light p-4 mb-3">
                    <div class="form-group bg-muted">
                        <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                        <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                    </div>
                </div>
                <div class="bg-light p-4">
                    <div class="form-group bg-muted">
                        <label for="namaPelanggan" class="font-weight-bold">Dukungan RTL</label>
                        <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
