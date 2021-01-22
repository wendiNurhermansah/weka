@extends('layouts.app')
@section('title', '| '.$title.'')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-users mr-2"></i>
                        Show {{ $title }} | {{ $admin_detail->nama }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li>
                        <a class="nav-link" href="{{ route($route.'index') }}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-user"></i>Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#edit-data" role="tab"><i class="icon icon-edit"></i>Edit Data</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route($route.'editPassword', $admin_detail->id) }}" class="nav-link"><i class="icon icon-key4"></i>Ganti Password</a>
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
                            <h6 class="card-header"><strong>Data Pegawai</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Username :</strong></label>
                                        <label class="col-md-3 s-12">{{ $admin->username }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Role :</strong></label>
                                        <label class="col-md-3 s-12">{{ $role->name }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Nama :</strong></label>
                                        <label class="col-md-3 s-12">{{ $admin_detail->nama }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Email :</strong></label>
                                        <label class="col-md-3 s-12">{{ $admin_detail->email }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>No Telpon :</strong></label>
                                        <label class="col-md-3 s-12">{{ $admin_detail->no_telp }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-right s-12"><strong>Foto :</strong></label>
                                        @if ($admin_detail->foto != null)
                                        <img class="ml-2 m-t-7 rounded-circle" src="{{ asset('images/ava/'.$admin_detail->foto) }}" width="100" alt="icon">
                                        @else
                                        <img class="ml-2 m-t-7 rounded-circle" src="{{ asset('images/404.png') }}" width="100" alt="icon">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.masterRole.pengguna.form_edit')
        </div>
    </div>
</div>
@endsection
