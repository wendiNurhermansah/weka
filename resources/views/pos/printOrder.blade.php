@push('modal')
    <div class="modal fade" id="printOrder" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Print Order</h4>
                    <button type="button" class="btn btn-light" data-dismiss="modal">PRINT</button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center my-4">
                        <h4 class="text-black modal-title font-weight-bold">Simple POS</h4>
                        <p class="text-black modal-title">Order</p>
                    </div>
                    <div class="form-group">
                        <label for="customer" class="">C : </label>
                        <label id="orderCustomer" for="orderCustomer" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="note" class="">R : </label>
                        <label for="getNote" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="pelayan" class="">U : </label>
                        <label for="getPelayan" class="">{{ Auth::user()->username }}</label>
                    </div>
                    <div class="form-group">
                        <label for="date" class="">T : </label>
                        <label for="getDate" class="">{{ date('D d M Y h:i A') }}</label>
                    </div>
                    <table class="table">
                            <tbody id="appendOrder">
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('script')
    <script>
        $(document).ready(function () {
            $('#buttonPrintOrder').click(function(){
                if($('#cariPelanggan').val() == ''){
                    $('#buttonPrintOrder').removeAttr('data-target'); 
                    alert('Please add name')
                    $('#cariPelanggan').css('border','red solid 1px')
                }else if($('#tabelTotal').html() == 0){
                    $('#buttonPrintOrder').removeAttr('data-target');
                    alert('Please add product')
                }else{
                    $('#buttonPrintOrder').attr('data-target','#printOrder');
                    $('#orderCustomer').html($('#cariPelanggan').val())
                }
            })  
        });

        $('#buttonPrintOrder').click(function(){
            for(i=1;i<=formAdd;i++){
                if($('#trTable_'+i).html() != null){
                    console.log('kode',$('#produkKode_'+i).val())
                    var order = `<tr>
                                    <td>
                                        #`+i+`&nbsp
                                        <span id="orderProduk_`+i+`"> &nbsp 
                                        </span><span id="orderKode_`+i+`"></span>
                                    </td>
                                    <td id="orderKuantitas_`+i+`"></td>
                                </tr>`;

                    $('#appendOrder').append(order)
                    $('#orderProduk_'+i).html($('#produk_'+i).val())
                    $('#orderKode_'+i).html('('+$('#produkKode_'+i).val()+')')
                    $('#orderKuantitas_'+i).html('['+$('#kuantitas_'+i).val()+']')
                }
            }  
        })      
    </script>
@endpush