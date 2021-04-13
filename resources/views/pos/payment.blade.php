@push('style')
    <style>
        .uang{
            width: 100px;
        }
        .badge{
            color: black !important;
        }
    </style>
@endpush

@push('modal')
<div class="modal fade" id="modalPayment" role="dialog">
    <div class="modal-dialog">
    
        <form id="formPayment" action="{{route('Pos.main.store')}}" method="POST">
            @csrf
        <!-- Modal content-->
        <div class="modal-content text-white">
            <div class="modal-header bg-green">
                <h4 class="text-black modal-title">Payment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body bg-success">
                <div class="row px-1">
                    <div class="col-md-9">
                        <input type="hidden" id="idPelanggan" name="idPelanggan">
                        <span id="dataProduk"></span>
                        <input type="hidden" id="membayar" name="membayar">
                        <input type="hidden" id="jumlahItem" name="jumlahItem">
                        {{-- <table class="table-bordered">
                            <tbody>
                                <tr>
                                    <th class="col">
                                        <span>Total Items</span>
                                        <span class="">0</span>
                                    </th>
                                    <th class="col">
                                        <span>Total Payable</span>
                                        <span class="">0</span>
                                    </th>
                                </tr>
                            </tbody>
                        </table> --}}
                        <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <th>
                                    <span class="d-flex">
                                        <span>Total Items</span>
                                        <span id="totItems" class="ml-auto">0</span>
                                    </span>
                                </th>
                                <th>
                                    <span class="d-flex">
                                        <span>Total Payable</span>
                                        <span id="totalPayable_Payment" class="ml-auto"></span>
                                    </span> 
                                </th>
                              </tr>
                              <tr>
                                <th>
                                    <span class="d-flex">
                                        <span>Total Paying</span>
                                        <span id="totalPaying" class="ml-auto">0</span>
                                    </span>
                                </th>
                                <th>
                                    <span class="d-flex">
                                        <span>Balance</span>
                                        <span id="saldo" class="ml-auto"></span>
                                    </span> 
                                </th>
                              </tr>
                            </tbody>
                          </table>
                          <div class="">
                                <label for="noteSebelumPembayaran" class="form-label">Note</label>
                                <textarea id="noteSebelumPembayaran" name="noteSebelumPembayaran" class="form-control w-100" value=""></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <label for="jumlah" class="form-label">Amount</label>
                                <input type="number" value="" class="form-control" id="jumlah" name="jumlah">
                            </div>
                            <div class="col-md-6">
                                <label for="metodePembayaran" class="form-label">Paying By</label>
                                <select class="form-control" id="metodePembayaran" name="metodePembayaran">
                                    <option value="cash">Cash</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="giftCard">Gift Card</option>
                                    <option value="Stripe">stripe</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                          </div>
                          <div class="">
                                <label for="notePembayaran" class="form-label">Payment Note</label>
                                <input type="textarea" value="" class="form-control" id="catatanPembayaran" name="catatanPembayaran">
                          </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="uangPas" onclick="bayarPas()" class="border uang btn btn-primary"></button><br>
                    <button type="button" onclick="bayar10()" class="border uang btn btn-warning">
                            <span id="uang10">10</span>
                            <span id="notif10" class="badge badge-dark">0</span>
                        </button> <br>
                        <button type="button" onclick="bayar20()" class="border uang btn btn-warning">
                            <span id="uang20">20</span>
                            <span id="notif20" class="badge badge-dark">0</span>
                        </button> <br>
                        <button type="button" onclick="bayar50()" class="border uang btn btn-warning">
                            <span id="uang50">50</span>
                            <span id="notif50" class="badge badge-dark">0</span>
                        </button>    <br>
                        <button type="button" id="uang100" onclick="bayar100()" class="border uang btn btn-warning">
                            <span id="uang100">100</span>
                            <span id="notif100" class="badge badge-dark">0</span>
                        </button> <br>
                        <button type="button" id="uang500"  onclick="bayar500()" class="border uang btn btn-warning">
                            <span id="uang500">500</span>
                            <span id="notif500" class="badge badge-dark">0</span>
                        </button> <br>
                        <button type="button" id="clear" onclick="hapus()" class="border uang btn btn-danger">clear</button>   <br>                     
                    </div>
                </div>
            
            </div>
            <div class="modal-footer bg-green">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endpush

@push('script')
    <script>
        $('#jumlah').keyup(function(){
            $('#totalPaying').html($('#jumlah').val())
            $('#saldo').html($('#jumlah').val()-$('#tabelTotal').html())
        })
        // function dibayar(){
        //     console.log('dibayar',$('#totalPaying').text())
        //     $('#dibayar').val($('#totalPaying').text())
        // }
            
        
        // $('#formPelanggan').on('submit', function (e) {
        //     $('#namaPelanggan').val($('#cariPelanggan').val())
        // })
        $( "#buttonPayment" ).click(function() {
            if($('#cariPelanggan').val() == ''){
                $('#buttonPayment').removeAttr('data-target'); 
                alert('Silahkan isi nama')
                $('#cariPelanggan').css('border','red solid 1px')
            }else if($('#tabelTotal').html() == 0){
                $('#buttonPayment').removeAttr('data-target'); 
                alert('Silahkan pilih produk')
            }else{
                $('#buttonPayment').attr('data-target','#modalPayment')
                $('#cariPelanggan').css('border','')
                $("#payment").on("hidden", function () {
                alert('ketutup')
                });
                $('#membayar').val($('#tabelTotal').html())
                $('#totItems').html($('#totalItems').html())
                $('#jumlah').val(0)
                // $('#dataProduk').hide()
                $('#jumlahItem').val($('#totalItems').html())
            // function payment(){
                // $('#idPelanggan').val($('#cariPelanggan').val())
                // $('#dataProduk').html($('#tableProduk').html())
                // panjang = $('#appendd tr').length;
                for(var i=1;i<=formAdd;i++){
                    if($('#trTable_'+i).html() != null){
                        var produk = `<div>
                                        <input id="payment_produk_id`+i+`" name="payment_produk_id[]">
                                        <input id="payment_biaya`+i+`" name="payment_biaya[]">
                                        <input id="payment_kuantitas`+i+`" name="payment_kuantitas[]">
                                        <input id="payment_sub_total`+i+`" name="payment_sub_total[]">
                                    <div>`; 
                        $('#dataProduk').append(produk)

                        $('#payment_produk_id'+i).val($('#produk_id'+i).val())
                        $('#payment_biaya'+i).val($('#biaya_satuan_'+i).val())
                        $('#payment_kuantitas'+i).val($('#kuantitas_'+i).val())
                        $('#payment_sub_total'+i).val($('#sub_total_'+i).val())    
                    }
                }

                var payment_diskon=`<input id="payment_diskon" name="payment_diskon">`
                $('#dataProduk').append(payment_diskon)
                var payment_pajak =`<input id="payment_pajak" name="payment_pajak">`
                $('#dataProduk').append(payment_pajak)

                $('#payment_diskon').val($('#hasilDiskon').html())
                $('#payment_pajak').val($('#hasilPajak').html())
                // $('#dibayar').val(0)

                totalPayable = $('#totalPayable').text();
                $('#uangPas').html(totalPayable);
                $('#totalPayable_Payment').html(totalPayable);
                totalPaying = $('#totalPaying').text();
                saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
                $('#saldo').html(saldo);
                $('.badge').html(0);
                $('.badge').hide();
            }
        })

        function bayar10(){
            totalPaying = $("#totalPaying").text();
            uang = $("#uang10").text();
            totalPaying = parseInt(totalPaying) + parseInt(uang);
            $("#totalPaying").html(totalPaying);
            $("#jumlah").val(totalPaying);
            totalPayable = $('#totalPayable').text();
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            notif = $('#notif10').text();
            notif++;
            $('#notif10').html(notif);
            $('#notif10').show();
        }
        function bayar20(){
            totalPaying = $("#totalPaying").text();
            uang = $("#uang20").text();
            totalPaying = parseInt(totalPaying) + parseInt(uang);
            $("#totalPaying").html(totalPaying);
            $("#jumlah").val(totalPaying);
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            notif = $('#notif20').text();
            notif++;
            $('#notif20').html(notif);
            $('#notif20').show();
        }
        function bayar50(){
            totalPaying = $("#totalPaying").text();
            uang = $("#uang50").text();
            totalPaying = parseInt(totalPaying) + parseInt(uang);
            $("#totalPaying").html(totalPaying);
            $("#jumlah").val(totalPaying);
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            notif = $('#notif50').text();
            notif++;
            $('#notif50').html(notif);
            $('#notif50').show();
        }
        function bayar100(){
            totalPaying = $("#totalPaying").text();
            uang = $("#uang100").text();
            totalPaying = parseInt(totalPaying) + parseInt(uang);
            $("#totalPaying").html(totalPaying);
            $("#jumlah").val(totalPaying);
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            notif = $('#notif100').text();
            notif++;
            $('#notif100').html(notif);
            $('#notif100').show();
        }
        function bayar500(){
            totalPaying = $("#totalPaying").text();
            uang = $("#uang500").text();
            totalPaying = parseInt(totalPaying) + parseInt(uang);
            $("#totalPaying").html(totalPaying);
            $("#jumlah").val(totalPaying);
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            notif = $('#notif500').text();
            notif++;
            $('#notif500').html(notif);
            $('#notif500').show();
        }
        function hapus(){
            $("#totalPaying").html(0);
            $("#jumlah").val('');
            totalPayable = $('#totalPayable').text();
            totalPaying = $('#totalPaying').text();
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            $('.badge').html(0);
            $('.badge').hide();
        }
        function bayarPas() {
            uangPas = $('#uangPas').text();
            $('#totalPaying').html(uangPas);
            $('#jumlah').val(uangPas);
            totalPayable = $('#totalPayable').text();
            totalPaying = $('#totalPaying').text();
            saldo = parseFloat(totalPaying) - parseFloat(totalPayable);
            $('#saldo').html(saldo);
            $('.badge').html(0);
            $('.badge').hide();
        }
    </script>
@endpush