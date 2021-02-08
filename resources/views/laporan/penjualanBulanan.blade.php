@extends('layouts.app')
@section('title', ' | Penjualan Bulanan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        PENJUALAN BULANAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="blue counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-shopping-cart s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated text" style="color:white;" >1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Penjualan</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="orange counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-plus s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Pembelian</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="red counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-chevron-circle-up s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Biaya</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="green counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-dollar s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Untung</h6>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
