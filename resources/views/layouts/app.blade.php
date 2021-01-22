@php
$template = App\Models\Template::select('id', 'logo', 'logo_title')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title --> 
    <link rel="icon" href="{{ asset('images/logo/'.$template->logo_title) }}" type="image/x-icon">
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- CSS -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">

</head>
<body class="light">
@include('layouts.preloader')
<div id="app">
    <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
        <section class="sidebar">
            <div class=" mt-3 mb-3">
                <img src="{{ asset('images/logo/'.$template->logo) }}" class="mx-auto d-block" width="100" alt="Logo Top">
            </div>
            <div class="relative">
                <a data-toggle="collapse" href="#userSettingsCollapse" role="button" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                    <i class="icon icon-cogs"></i>
                </a>
                <div class="user-panel p-3 light mb-2">
                    <div>
                        <div class="float-left image ml-2">
                            <img class="rounded-circle img-circular mr-3" width="60" height="60" src="{{ asset('images/ava/' . Auth::user()->admin_detail[0]->foto) }}" alt="User Image">
                        </div>
                        <div class="float-left info mt-1">
                            <h6 class="font-weight-light mb-1">{{ Auth::user()->username }}</h6>
                            <a class="text-primary"><i class="icon-circle text-primary blink mr-1"></i>Online</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="collapse multi-collapse" id="userSettingsCollapse">
                        <div class="list-group mt-3 shadow">
                            <a href="{{ route('master-profile.profile.index') }}" class="list-group-item list-group-item-action ">
                                <i class="mr-2 icon-user text-blue"></i>Profile
                            </a>
                            @can('setting-template')
                            <a href="{{ route('config-template.template.index') }}" class="list-group-item list-group-item-action">
                                <i class="mr-2 icon-cogs"></i>Settings
                            </a>
                            @endcan
                            <a href="{{ route('master-profile.profile.editPassword', Auth::user()->admin_detail[0]->id) }}" class="list-group-item list-group-item-action">
                                <i class="mr-2 icon-key4 orange-text"></i>Change Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.navigation')
        </section>
    </aside>
    @include('layouts.topbar')
    <main>
    @yield('content')
    </main>
</div>
</body>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/').'/') !!}
    </script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/myScript.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-fancybox.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @yield('script')
</html>
