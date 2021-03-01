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
            <p>Please fill in the information below</p>
            <div class="form-group">
                <label for="nomorKartu" class="font-weight-bold">Card No</label>
                <input class="form-control" type="text" value="" id="nomorKartu" name="nomorKartu">
                <button type="button" onclick="randomNomorKartu()" class="btn btn-secondary">&#9762;</button>
            </div>
            <div class="form-group">
                <label for="nilai" class="font-weight-bold">Value</label>
                <input class="form-control" type="text" value="" id="nilai" name="nilai">
            </div>
            <div class="form-group">
                <label for="harga" class="font-weight-bold">Price</label>
                <input class="form-control" type="number" value="" id="harga" name="harga">
            </div>
            <div class="form-group">
                <label for="tanggalKedaluwarsa" class="font-weight-bold">Expiry Date</label>
                <input class="form-control" type="date" value="" id="tanggalKedaluwarsa" name="tanggalKedaluwarsa">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>

        </div>
    </div>
@endpush

@push('script')
    <script>
        // klik angka random
        function randomNomorKartu() {
            var random = Math.floor((Math.random() * 10000000000000000) + 1);
            $('#nomorKartu').val(random);
        }

         // limit nomor kartu
         $("#nomorKartu").attr('maxlength','16');

        // no.card
        $("#nomorKartu").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
        });
    </script>
@endpush