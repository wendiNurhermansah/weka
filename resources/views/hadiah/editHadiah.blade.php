@extends('layouts.app')
@section('title', ' | Edit Daftar Hadiah')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT DAFTAR HADIAH
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Hadiah.hadiah.update', $Hadiah->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Hadiah->id}}"/>
                    <h4 id="formTitle">Edit Pelanggan</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="card">Card No</label>
                                <input type="text" class="form-control @error('card') is-invalid @enderror"  maxlength="16" id="card" placeholder="" name="card" value="{{ $Hadiah->card }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="nilai">Nilai</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" placeholder="" name="nilai" value="{{ $Hadiah->nilai }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="kedaluwarsa">Tanggal Kedaluwarsa</label>
                                <input type="date" class="form-control @error('kedaluwarsa') is-invalid @enderror" id="kedaluwarsa" placeholder="" name="kedaluwarsa" value="{{ $Hadiah->kedaluwarsa }}" required>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary" id="action">Rubah<span id="txtAction"></span></button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
