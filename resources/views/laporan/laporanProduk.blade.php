@extends('layouts.app')
@section('title', ' | Laporan Produk')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        LAPORAN PRODUK
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
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th width="30">NO</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Pengguna</th>
                            <th>Terjual</th>
                            <th>Pajak</th>
                            <th>Biaya</th>
                            <th>Penghasilan</th>
                            <th>Untung</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection