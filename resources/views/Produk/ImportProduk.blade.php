@extends('layouts.app')
@section('title', '| Dashboard  ')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-dashboard"></i>
                        IMPORT PRODUK
                    </h4>
                </div>
            </div>
        </div>
    </header>
    {{-- <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
            @include('pages.dashboard.card1')
            @include('pages.dashboard.card2')
            </div>
        </div>
    </div> --}}
</div>
@endsection
