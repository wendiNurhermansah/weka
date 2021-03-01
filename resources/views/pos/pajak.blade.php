@push('modal')
    <div class="modal fade" id="modalPajak" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content w-50 mx-auto">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Tax (5 or 5%)</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="inputPajak" name="inputPajak" class="form-control" value="5%" placeholder="">
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updatePajak()">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $("#inputPajak").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9-%]/g)) return false;
        });

        $("#nilaiPajak").html(5);
        nilaiPajak = $("#nilaiPajak").text();
        var total = $('#tabelTotal').text();
        hasilPajak = total * nilaiPajak / 100
        $("#hasilPajak").html(hasilPajak);
        var bayar = parseFloat(total) + parseFloat(hasilPajak);
        $('#totalPayable').html(bayar);
    })

    function updatePajak()
        {
            var pajak = $('#inputPajak').val();
            $('#nilaiPajak').html(pajak);
            var total = $('#tabelTotal').text();  
            hasilPajak = total * pajak / 100;
            $('#hasilPajak').html(hasilPajak);
            var hasilDiskon = $('#hasilDiskon').text();
            bayar = parseFloat(total - hasilDiskon) + parseFloat(hasilPajak);
            $('#totalPayable').html(bayar);
            $('#modalPajak').modal('toggle');
            $('#inputPajak').val('5%');

            // return hasilPajak;
        }
</script>
@endpush