@php
$template = App\Models\Template::select('id', 'logo', 'logo_title', 'logo_auth')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <link rel="icon" href="{{ asset('images/logo/'.$template->logo_title) }}" type="image/x-icon">
    <title>{{ config('app.name') }} | Form Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

</head>
<body class="light">
    <div class="page parallel">
        <div class="d-flex row">
            <div class="col-md-3 white">
                <div class="pl-5 pt-5 pr-5 mt-5 pb-0">
                    <img src="{{ asset('images/logo/'.$template->logo) }}" class="mx-auto d-block" width="150" alt=""/>
                </div>
                <div class="p-5">
                    <h3>Selamat Datang</h3>
                    <p>Silahkan masukan username dan password Anda.</p>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-group has-icon"><i class="icon icon-user"></i>
                            <input type="username" class="form-control form-control-lg  @if ($errors->has('username')) is-invalid @endif" placeholder="username" name="username" autocomplete="off" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-group has-icon"><i class="icon icon-user-secret"></i>
                            <input type="password" class="form-control form-control-lg @if ($errors->has('password')) is-invalid @endif" placeholder="Password" name="password" autocomplete="off" value="{{ old('password') }}" required>
                            @if ($errors->has('password'))
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                    </form>
                </div>
            </div>
            <div class="col-md-9 height-full blue accent-3 align-self-center text-center img-fluid img-responsive" data-bg-repeat="false" data-bg-possition="center" style="background: url('images/logo/{{$template->logo_auth}}') #FFEFE4">
            </div>
        </div>
    </div>
</body>
</html>