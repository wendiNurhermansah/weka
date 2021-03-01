@push('modal')
    <div class="modal fade" id="modalDiskon" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <form action=""></form>
            <div class="modal-content w-50 mx-auto">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Discount (5 or 5%)</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="inputDiskon" name="inputDiskon" class="form-control" placeholder="" value="0" onclick="">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input border rounded-circle" type="checkbox" id="orderTotal" value="orderTotal">
                        <label class="form-check-label" for="orderTotal">Apply to order total</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="allOrder" value="allOrder">
                        <label class="form-check-label" for="allOrder">Apply to all order items</label>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateDiskon()" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
<script>
    $("#inputDiskon").keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9-%]/g)) return false;
    });
    $("#nilaiDiskon").html('0');
    $("#hasilDiskon").html('0');

    function updateDiskon()
        {
            var diskon = $('#inputDiskon').val();
            $('#nilaiDiskon').html(diskon);
            var total = $('#tabelTotal').text();
            // 100  
            hasilDiskon = total * diskon / 100 ;
            // 10
            $('#hasilDiskon').html(hasilDiskon);
            // 10
            var nilaiPajak = $('#nilaiPajak').text();
            // 1%
            hasilPajak = (total - hasilDiskon) * nilaiPajak / 100 ;
                            // (100 - 10) * 1% = 9
                                // 90
            hasilPajak = hasilPajak.toFixed(2);
            $('#hasilPajak').html(hasilPajak);
            // 9
            bayar = total - hasilDiskon + parseFloat(hasilPajak);
            bayar = bayar.toFixed(2);
            $('#totalPayable').html(bayar);
            $('#modalDiskon').modal('toggle');
            $('#inputDiskon').val('0');
            
            // return hasilDiskon;
        }
</script>
@endpush