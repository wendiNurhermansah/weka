@extends('layouts.app')
@section('title', ' | Tambah Biaya')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-money mr-1"></i>
                        TAMBAH BIAYA
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" id="form" method="POST"  novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Tambah Biaya</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{ old('tanggal') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="referensi">Referensi</label>
                                <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" placeholder="" name="referensi" value="{{ old('referensi') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="{{ old('jumlah') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="lampiran">lampiran</label>
                                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" id="lampiran" placeholder="" name="lampiran" value="{{ old('lampiran') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="catatan">Catatan</label>
                                <textarea name="" id="" cols="30" rows="10"></textarea>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary btn-sm" id="action">Tambah Biaya<span id="txtAction"></span></button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
    </script>
@endsection

