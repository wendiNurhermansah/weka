@extends('layouts.app')
@section('title', ' | Edit Biaya')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT BIAYA
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Pembelian.biaya.update', $Biaya->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Edit Biaya</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-5">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{  date('Y-m-d') }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="referensi">Referensi</label>
                                <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" placeholder="" name="referensi" value="{{ $Biaya->referensi }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="{{ $Biaya->jumlah }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="dibuat">Dibuat Oleh</label>
                                <input type="text" class="form-control @error('dibuat') is-invalid @enderror" id="dibuat" placeholder="" name="dibuat" value="{{ $Biaya->dibuat }}" required>

                            </div>
                            <div class="form-group col-md-5">
                                <label for="catatan">Catatan</label>
                                <textarea name="catatan" id="catatan" cols="30" rows="10" required>{!!$Biaya->catatan!!}</textarea>

                            </div>

                            <div class="mt-2 col-md-8" style="">
                                <button type="submit" class="btn btn-primary btn-sm" id="action">Edit Biaya<span id="txtAction"></span></button>

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
