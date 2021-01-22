@extends('layouts.app')
@section('title', '| 404')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-documents"></i>
                        Not Found
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce pt-5">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                <div class="text-center p-5">
                    <i class="icon-note-important s-64 text-primary"></i>
                    <h4 class="my-3">oops!</h4>
                    <p>Something went wrong. The page you are looking for is gone</p>
                    <a href="{{ route('home') }}">
                        <button class="btn btn-outline-primary" type="button">
                            <i class="icon icon-arrow_back"></i>
                            Go To Back Home
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
