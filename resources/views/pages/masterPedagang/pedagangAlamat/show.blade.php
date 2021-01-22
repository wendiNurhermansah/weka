@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-address-card-o mr-2"></i>
                        Show {{ $title }} | {{ $pedagangAlamat->pedagang->nm_pedagang }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li>
                        <a class="nav-link" href="{{ route($route.'index') }}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h6 class="card-header"><strong>Data Pedagang</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Nama :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pedagang->nm_pedagang }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Alamat :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pedagang->alamat_pedagang }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>No Telp :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pedagang->no_telp }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>No KTP :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pedagang->no_ktp }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <h6 class="card-header"><strong>Alamat Toko</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Nama Toko:</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->nm_toko }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Kode Toko :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->kd_toko }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Tanggal Tinggal :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->tgl_tinggal }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Status :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Alamat Toko :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->pasar->nm_pasar }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Jenis Toko :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->jenisLapak->nm_jenis_lapak }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Jenis Usaha :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->jenisUsaha->nm_kategori }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Luas :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->luas }} M<sup>2</sup></label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>ukuran :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->ukuran }} M</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Nama Blok :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->nm_blok }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Retribusi :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pedagangAlamat->pasarkategori->retribusi }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
