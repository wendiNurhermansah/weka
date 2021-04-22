@push('modal')
    <div class="modal fade" id="tutupDaftar" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="printContent3()"  id="printbill">PRINT</button>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="tutupPrint">
                    <h4 class="text-black modal-title">Register Details (Opened at: {{ date('d F Y h:i A') }})</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Cash Sales :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Cheque Sales :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Credit Card :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Gift Card Sales :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Stripe :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Others :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Total Cash :</th>
                                <th class="text-right">0000</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('script')
<script>
    function printContent3(){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById('tutupPrint').innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>

@endpush
