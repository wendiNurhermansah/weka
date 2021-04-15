@push('modal')
    <div class="modal fade" id="bill" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Print Bill</h4>
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
                        <label for="getCustomter" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="note" class="">R : </label>
                        <label for="getNote" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="pelayan" class="">U : </label>
                        <label for="getPelayan" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="date" class="">T : </label>
                        <label for="getDate" class="">{{ date('D d M Y h:i A') }}</label>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total Items</span>
                                <span class="ml-auto">0</span>
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
        $(document).ready(function(){
            $('#buttonPrintBill').click(function(){
                if($('#cariPelanggan').val() == ''){
                    $('#buttonPrintBill').removeAttr('data-target'); 
                    alert('Please add name')
                    $('#cariPelanggan').css('border','red solid 1px')
                }else if($('#tabelTotal').html() == 0){
                    $('#buttonPrintOrder').removeAttr('data-target');
                    alert('Please add product')
                }else{
                    $('#buttonPrintOrder').attr('data-target','#printOrder');
                    var total = $("#tabelTotal").text();
                    $("#billTotal").html(total);
                    var pajak = $("#hasilPajak").text();
                    $("#billPajak").html(pajak);
                    var totalPayable = $("#totalPayable").text();
                    $("#grandTotal").html(totalPayable);
                    $("#billTotalPayable").html(totalPayable);
                }
            })
        })
    </script>
@endpush