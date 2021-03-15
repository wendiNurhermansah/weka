@extends('layouts.app')
@section('title', ' | Penjualan Bulanan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="fas fa-angle-double-up"></i>
                        PRODUK TERATAS
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card" style="height: 30rem;">
                    <h5 class="card-header">Bulan ini :</h5>
                    <div class="card-body">

                    </div>

                  </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="height: 30rem;">
                    <h5 class="card-header">Bulan Lalu :</h5>
                    <div class="card-body">

                    </div>

                  </div>
            </div>
        </div>

        <div class="row" style="margin-top:30px; ">
            <div class="col-md-6">
                <div class="card" style="height: 30rem;">
                    <h5 class="card-header">3 Bulan Terakhir :</h5>
                    <div class="card-body">

                    </div>

                  </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="height: 30rem;">
                    <h5 class="card-header">12 Bulan Terakhir :</h5>
                    <div class="card-body">

                    </div>

                  </div>
            </div>
        </div>



    </div>

@endsection
