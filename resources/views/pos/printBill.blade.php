@push('modal')
    <div class="modal fade" id="bill" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="printbill">
                <div class="modal-header">
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="printContent()"  id="printbill">PRINT</button>
                    <button type="button" class="close" data-dismiss="modal" id="closeBill">&times;</button>
                </div>
                <div class="modal-body" id="BillPrint">
                    <div class="text-center my-4">
                        <h4 class="text-black modal-title font-weight-bold">Simple POS</h4>
                        <p class="text-black modal-title">Order</p>
                    </div>
                    <div class="form-group">
                        <label for="customer" class="">C : </label>
                        <label id="billCustomer" for="billCustomer" class=""></label>
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
                        <tbody id="appendBill">
                        </tbody>
                    </table>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total Items</span>
                                <span class="ml-auto">
                                    <span id="billJumlahItem"></span>
                                    (<span id="billTotalItem"></span>)
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total</span>
                                <span id="billTotal" class="ml-auto"></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Order Tax</span>
                                <span id="billPajak" class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Grand Total</span>
                                <span id="grandTotal" class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Rounding</span>
                                <span class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total Payable</span>
                                <span id="billTotalPayable" class="ml-auto"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="m-1 text-center">Merchant Copy</div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script>
        var restorepage = '';
        $(document).ready(function(){
            restorepage = document.body.innerHTML;
            $('#buttonPrintBill').click(function(){
                if($('#cariPelanggan').val() == ''){
                    $('#buttonPrintBill').removeAttr('data-target');
                    alert('Please add name')
                    $('#cariPelanggan').css('border','red solid 1px')
                }else if($('#tabelTotal').html() == 0){
                    $('#buttonPrintBill').removeAttr('data-target');
                    alert('Please add product')
                }else{
                    $('#buttonPrintOrder').attr('data-target','#printBill');
                    var total = $("#tabelTotal").text();
                    $("#billTotal").html(total);
                    var pajak = $("#hasilPajak").text();
                    $("#billPajak").html(pajak);
                    var totalPayable = $("#totalPayable").text();
                    $("#grandTotal").html(totalPayable);
                    $("#billTotalPayable").html(totalPayable);
                    $('#billCustomer').html($('#cariPelanggan').val())
                    $('#billJumlahItem').html($('#totalItems').html());
                }
            })
            $('#bill').on('hidden.bs.modal', function () {
                    $('#appendBill > tr').remove()
                })
        })



        $('#buttonPrintBill').click(function(){
            let totalItem = 0
            for(i=1;i<=formAdd;i++){
                if($('#trTable_'+i).html() != null){
                    console.log('kode',$('#produkKode_'+i).val())
                    var order = `<tr>
                                    <td colspan="2">
                                        #`+i+`&nbsp
                                        <span id="billProduk_`+i+`"> &nbsp
                                        </span><span id="billKode_`+i+`"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="billKuantitas_`+i+`"></span>
                                        <span id="billHarga_`+i+`"></span>
                                    </td>
                                    <td id="billSubTotal_`+i+`" class="text-right"></td>
                                </tr>`;

                    $('#appendBill').append(order)
                    $('#billProduk_'+i).html($('#produk_'+i).val())
                    $('#billKode_'+i).html('('+$('#produkKode_'+i).val()+')')
                    $('#billKuantitas_'+i).html('('+$('#kuantitas_'+i).val()+' x ')
                    $('#billHarga_'+i).html($('#biaya_satuan_'+i).val()+')')
                    $('#billSubTotal_'+i).html($('#sub_total_'+i).val())
                    totalItem = parseInt(totalItem) + parseInt($('#kuantitas_'+i).val())
                }
                console.log('tot',totalItem)
                $('#billTotalItem').html(totalItem)
            }
        })

        // $("#printBill").click(function () {
        //     $(document).not('#bill').remove();
        // })
        function printContent(){
            $('#bill').modal('hide')
            var printcontent = document.getElementById('BillPrint').innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
@endpush
