@push('modal')
    <div class="modal fade" id="hadiah" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title"><i class="icon icon-folder"></i>  Sell Gift Card</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="alertHadiah"></div>
            <p>Please fill in the information below</p>
            <form class="needs-validation" id="formHadiah" method="POST"  novalidate>
                @csrf
                <div class="form-group">
                    <label for="nomorKartu" class="font-weight-bold">Card No</label>
                    <input class="form-control @error('card') is-invalid @enderror" type="text" value="" id="card" name="card" required>
                    <button type="button" onclick="randomNomorKartu()" class="btn btn-secondary">&#9762;</button>
                </div>
                <div class="form-group">
                    <label for="nilai" class="font-weight-bold">Value</label>
                    <input class="form-control @error('nilai') is-invalid @enderror" type="text" value="" id="nilai" name="nilai" required>
                </div>
                <div class="form-group">
                    <label for="harga" class="font-weight-bold">Price</label>
                    <input class="form-control @error('harga') is-invalid @enderror" type="number" value="" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="tanggalKedaluwarsa" class="font-weight-bold">Expiry Date</label>
                    <input class="form-control @error('kedaluwarsa') is-invalid @enderror" type="date" value="" id="kedaluwarsa" name="kedaluwarsa" max="2030-12-12" required>
                    <span>Tahun < 2031</span>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="add()">Save changes</button>
                </div>
            </form>
        </div>

        </div>
    </div>
@endpush

@push('script')
    <script>
        // klik angka random
        function randomNomorKartu() {
            var random = Math.floor((Math.random() * 10000000000000000) + 1);
            $('#card').val(random);
        }

         // limit nomor kartu
         $("#card").attr('maxlength','16');
        //  limit tanggal
        //  $('#kedaluwarsa').keyup(function (e) { 
        //     kd = $('#kedaluwarsa').val()
        //     console.log(kd)
        //  });

        // no.card
        $("#card").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
        });

        $('#formHadiah').on('submit', function (e) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }else{
                $('#alert').html('');
                url = "{{ route('Hadiah.hadiah.store') }}",
                $.ajax({
                    url : url,
                    type : 'POST',
                    data: new FormData(($(this)[0])),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        console.log(data);
                        $('#alertHadiah').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                        add();
                        formAdd++;
                        var html = `
                            <tr id="trTable_`+formAdd+`" class="bg-gradient-danger">
                                                                <td text-align: left;">
                                                                    <input type="text" class="searchProduk" id="produk_id`+formAdd+`" name="produk_id[]" hidden>
                                                                    <input type="text" id="produk_`+formAdd+`" name="produk_[]" class="searchProduk" style="width:160px;" readonly>

                                                                </td>
                                                                <td>
                                                                    <input type="text"  id="biaya_satuan_`+formAdd+`" class="searchProduk" style="width:70px;" float: right;" name="biaya_satuan[]" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="kuantitas_`+formAdd+`" onkeyup="hitungKuantitas(`+formAdd+`)" class="searchProduk" style="width:30px;" text-align: center;" name="kuantitas[]">
                                                                </td>
                                                                <td>
                                                                    <input type="text"  id="sub_total_`+formAdd+`"  class="searchProduk" style="width:70px;" float: right; border: none;" name="sub_total[]" >
                                                                </td>
                                                                <td>

                                                                    <a href='#' onclick='hapusTable(`+formAdd+`)' title='Hapus data'><i class="icon-trash text-danger"></i>  </a>
                                                                </td>
                                                            </tr>

                                                        `;
                        $('#appendd').append(html);//tambah item
                        
                        card = $('#card').val()
                        $('#produk_'+formAdd).val('Git Card ( '+card+' )');//ambil id
                        harga = $("#harga").val()

                        $('#biaya_satuan_'+formAdd).val(harga);//ambil biaya
                        $('#kuantitas_'+formAdd).val(1);//ambil kuantitias                        
                        $('#sub_total_'+formAdd).val(harga);//subtotal

                        $("alertHadiah").html()
                        $("#formHadiah").trigger("reset")                                
                        $('#hadiah').modal('toggle')

                    },
                    error : function(data){
                        err = '';
                        respon = data.responseJSON;
                        if(respon.errors){
                            $.each(respon.errors, function( index, value ) {
                                err = err + "<li>" + value +"</li>";
                            });
                        }
                        $('#alertHadiah').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                    }
                });
                return false;
            }
            $(this).addClass('was-validated');
        });
    </script>
@endpush