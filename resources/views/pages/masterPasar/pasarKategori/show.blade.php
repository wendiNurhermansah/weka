@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-local_convenience_store  mr-2"></i>
                        Show {{ $title }} | {{ $pasarkategori->pasar->nm_pasar }}
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
                            <h6 class="card-header"><strong>Data Pasar Kategori</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Pasar :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->pasar->nm_pasar }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Jenis Lapak :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->jenisLapak->nm_jenis_lapak }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Luas :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->luas }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Ukuran :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->ukuran }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Retribusi :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->retribusi }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Jumlah :</strong></label>
                                        <label class="col-md-3 s-12">{{ $pasarkategori->jumlah }}</label>
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
