@extends('layouts.app')
@section('title', ' | Edit')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-1"></i>
                        EDIT PEMBELIAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ route('Pembelian.pembelian.update', $Pembelian->id) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$Pembelian->id}}"/>
                    <h4 id="formTitle">Edit Pembelian</h4><hr>
                    <div id="alert"></div>
                    <div class="form-row">
                        <div class="col md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col md-6">
                            <label for="referensi">Referensi</label>
                            <input type="text" class="form-control @error('referensi') is-invalid @enderror" id="referensi" placeholder="" name="referensi" value="{{ $Pembelian->referensi }}" required>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text"   class="form-control @error('produk') is-invalid @enderror" id="id1" placeholder="cari produk dengan kode atau nama" name="" value="s" required>

                            </div>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped" style="width:100%">
                                    <thead style="text-align: center;">
                                    <tr>
                                        <th>Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Biaya Satuan</th>
                                        <th>Sub Total</th>
                                        <th width="60"><i class="fas fa-trash-alt"></i></th>
                                    </tr>

                                    </thead>
                                    <tbody style="text-align: center;" id="appendd">
                                        <tr>
                                            <td style="width: 300px; text-align: left;">
                                                <input type="text" id="id2" name="produk" style="width: 400px; border: none;" value="{{ $Pembelian->produk }}">
                                            </td>
                                            <td>
                                                <input type="text" id="id3" style="width: 200px; text-align: center;" name="kuantitas" value="{{ $Pembelian->kuantitas }}">
                                            </td>
                                            <td>
                                                <input type="text"  id="id4" style="width: 200px; text-align: center;" name="biaya_satuan" value="{{ $Pembelian->biaya_satuan }}">
                                            </td>
                                            <td>
                                                <input type="text"  id="id4"  style="width: 100px; text-align: center; border: none;" name="sub_total" value="{{ $Pembelian->sub_total }}">

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
                                            <input type="text"  id="total_" style="width: 100px; text-align: center; border: none;" name="total" value="{{ $Pembelian->total }}">
                                          </th>
                                          <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pemasok">Pemasok</label>
                                <div class=" p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="pemasok" id="pemasok" autocomplete="off">
                                        <option value="">Pilih Pemasok :</option>
                                        @foreach ($Pemasok as $i)
                                        <option value="{{$i->id}}"
                                            @if($Pembelian->pemasok == $i->id) selected @endif>{{$i->nama}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diterima">Diterima</label>
                                <div class=" p-0 bg-light">
                                    <select class="select2 form-control r-0 light s-12" name="diterima" id="diterima" autocomplete="off">
                                        <option value="Diterima" @if($Pembelian->diterima == 'Diterima') selected @endif>Diterima</option>
                                        <option value="Belum Diterima" @if($Pembelian->diterima == 'Belum Diterima') selected @endif>Belum Diterima</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" id="lampiran" placeholder="cari produk dengan kode atau nama" name="lampiran" value="{{ $Pembelian->lampiran }}" >

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="10" required>{{ $Pembelian->catatan }}"</textarea>
                        </div>


                        <div class="mt-2 col-md-8" style="">
                            <button type="submit" class="btn btn-primary" id="action">Rubah Pembelian<span id="txtAction"></span></button>

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
                        // console.log(data);
                        response( data );
                    }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    // $('#id1').val(ui.item.label);
                    price(ui.item.id);
                    // console.log(ui.item.value);
                    // console.log(ui.item.id);
                    return false;
                }
            });
        });

        var formAdd = 0;

        function price(id) {
        formAdd++;
        console.log(formAdd);
        // console.log(price());

        var url = "{{ route('Pembelian.pembelian.price', ':id') }}".replace(':id', id);

        var html = `
        <tr id="trTable_`+formAdd+`">
                                            <td style="width: 300px; text-align: left;">

                                                <input type="text" id="produk_`+formAdd+`" name="produk" style="width: 400px; border: none;">

                                            </td>
                                            <td>
                                                <input type="text" id="kuantitas_`+formAdd+`" onkeyup="hitungKuantitas()" style="width: 200px; text-align: center;" name="kuantitas">
                                            </td>
                                            <td>
                                                <input type="text"  id="biaya_satuan_`+formAdd+`"  onkeyup="hitungKuantitas()" style="width: 200px; text-align: center;" name="biaya_satuan">
                                            </td>
                                            <td>
                                                <input type="text"  id="sub_total_`+formAdd+`"  style="width: 100px; text-align: center; border: none;" name="sub_total">
                                            </td>
                                            <td>

                                                <a href='#' onclick='hapusTable(`+formAdd+`)' class='text-danger' title='Hapus data'><i class="fas fa-trash-alt"></i>  </a>
                                            </td>
                                        </tr>

                                    `;

         $.get(url, function (res) {
            // console.log(res);
            //  console.log(res.kode);
            // $('#produk_0').val(res.nama);
            // $('#id3').val(res.kode);
            $('#appendd').append(html);

            $('#produk_'+formAdd).val(res.nama);
            // $.each(res.data, function(index, value){

            // });
        }, 'JSON').done(function () {
            console.log('Done');
        }).fail(function(e){
            console.log('Error');
        });



        }

    //delete table
    function hapusTable(formAdd){
        $('#trTable_'+formAdd).remove();
    }

    // penjumlahan
var total2 = 0 ;
    function hitungKuantitas(){
        var kuantitas  = $("#kuantitas_"+formAdd).val();
        // console.log(kuantitas);
        var biaya = $("#biaya_satuan_"+formAdd).val();
        // console.log(biaya);
        var total = kuantitas * biaya;

        total2 += total;
        // console.log(total);
        $("#sub_total_"+formAdd).val(total);

        var sum = 0;
        $("#sub_total_"+formAdd).each(function() {
        sum += Number($(this).val());
        $('#total_').val(total2);

    });

    }

    </script>
@endsection
