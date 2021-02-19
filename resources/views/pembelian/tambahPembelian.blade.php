@extends('layouts.app')
@section('title', ' | Tambah Pembelian')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-1"></i>
                        TAMBAH PEMBELIAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" id="form" method="POST"  novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Tambah Pembelian</h4><hr>
                    <div class="form-row">
                        <div class="col md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div>
                        <div class="col md-6">
                            <label for="referensi">Referensi</label>
                            <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" placeholder="" name="referensi" value="{{ old('referensi') }}" required>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="id1" placeholder="cari produk dengan kode atau nama" name="nama_depan" value="{{ old('nama_depan') }}" required>

                            </div>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped" style="width:100%">
                                    <thead style="text-align: center;">
                                    <tr>
                                        <th>Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Biaya Satuan</th>
                                        <th>Sub Total</th>
                                        <th width="60">Tindakan</th>
                                    </tr>

                                    </thead>
                                    <tbody style="text-align: center;">
                                        <tr>
                                            <td style="width: 300px; text-align: left;">
                                                <input type="hidden">
                                                <span>wendi</span>
                                            </td>
                                            <td>
                                                <input type="text" value="1" style="width: 200px; text-align: center;">
                                            </td>
                                            <td>
                                                <input type="text" value="10.000" style="width: 200px; text-align: center;">
                                            </td>
                                            <td>
                                                <span></span>

                                            </td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                    <tfoot style="text-align: center;">
                                        <tr>
                                          <th>Total</th>
                                          <th></th>
                                          <th></th>
                                          <th>
                                              <span>0.00</span>
                                          </th>
                                          <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="group">Pemasok</label>
                                <div class=" p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="group" id="group" autocomplete="off">
                                        <option value="">Pilih Pemasok :</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="group">Diterima</label>
                                <div class=" p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="group" id="group" autocomplete="off">
                                        <option value="Diterima">Diterima</option>
                                        <option value="Belum Diterima">Belum Diterima</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_depan">Lampiran</label>
                                <input type="file" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" placeholder="cari produk dengan kode atau nama" name="nama_depan" value="{{ old('nama_depan') }}" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Catatan</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>


                        <div class="mt-2 col-md-8" style="">
                            <button type="submit" class="btn btn-primary" id="action">Tambahkan Pembelian<span id="txtAction"></span></button>
                            <a class="btn btn-danger" onclick="add()" id="reset">Atur Ulang</a>
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

   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            // ajax get product
            $( "#id1" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                    url:"{{route('Pembelian.produk')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#id1').val(ui.item.label); // display the selected text
                    return false;
                }
            });
        });
    </script>
@endsection
