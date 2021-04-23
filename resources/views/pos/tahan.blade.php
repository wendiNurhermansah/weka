@push('modal')
<div class="modal fade" id="hold" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-black modal-title">Suspend Sale</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formPayment" action="{{route('daftarpenjualan.openBill')}}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id"/>
                    <h4 id="formTitle">Type Reference Note</h4><hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="validasiKode" class="form-group col-md-12">
                                <label for="pelanggan_id">Pelanggan</label>
                                <input type="text" class="form-control @error('pelanggan_id') is-invalid @enderror" id="HoldPelanggan" placeholder="" name="pelanggan_id" value="{{ old('pelanggan_id') }}"  maxlength="4" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nota">Nota</label>
                                <input type="text" class="form-control @error('nota') is-invalid @enderror" id="holdnota" placeholder="masukan Nota Referensi" name="nota" value="{{ old('nota') }}" size="20" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="itemTotal">Item Total</label>
                                <input type="text" class="form-control @error('itemTotal') is-invalid @enderror" id="holditemTotal" placeholder="" name="itemTotal" value="{{ old('itemTotal') }}" size="20" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="subTotal">sub Total</label>
                                <input type="text" class="form-control @error('subTotal') is-invalid @enderror" id="holdgrandTotal" placeholder="" name="subTotal" value="{{ old('subTotal') }}" size="20" required>
                            </div>

                            <span id="HoldDataProduk"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endpush
@push('script')
<script type="text/javascript">
     $( "#buttonHold" ).click(function() {
            if($('#cariPelanggan').val() == ''){
                $('#buttonHold').removeAttr('data-target');
                alert('Please add name')
                $('#cariPelanggan').css('border','red solid 1px')
            }else if($('#tabelTotal').html() == 0){
                $('#buttonHold').removeAttr('data-target');
                alert('Please add product')
            }else{
                $('#buttonHold').attr('data-target','#hold')
                $('#cariPelanggan').css('border','')

                $('#HoldPelanggan').val($('#idPelanggan').val())
                $('#holditemTotal').val($('#totalItems').html())
                $('#holdgrandTotal').val($('#tabelTotal').html())



                for(var i=1;i<=formAdd;i++){
                    if($('#trTable_'+i).html() != null){
                        var produk = `<div>
                                        <input id="holdProduk`+i+`" name="holdProduk[]">
                                        <input id="holdBiaya`+i+`" name="holdBiaya[]">
                                        <input id="holdKuantitas`+i+`" name="holdKuantitas[]">
                                        <input id="holdSubTotal`+i+`" name="holdSubTotal[]">
                                    <div>`;
                        $('#HoldDataProduk').append(produk)

                        $('#holdProduk'+i).val($('#produk_id'+i).val())
                        $('#holdBiaya'+i).val($('#biaya_satuan_'+i).val())
                        $('#holdKuantitas'+i).val($('#kuantitas_'+i).val())
                        $('#holdSubTotal'+i).val($('#sub_total_'+i).val())
                    }
                }
            }
     });
</script>

@endpush
