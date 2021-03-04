@push('modal')
    <div class="modal fade" id="pelanggan" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Tambahkan Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                        <label for="namaPelanggan" class="font-weight-bold">Name</label>
                        <input class="form-control" type="text" value="" id="namaPelanggan" name="namaPelanggan">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="emailPelanggan" class="font-weight-bold">Alamat Email</label>
                            <input class="form-control" type="text" value="" id="emailPelanggan" name="emailPelangaan">
                        </div>
                        <div class="col-md-6">
                            <label for="teleponPelanggan" class="font-weight-bold">Telepon</label>
                            <input class="form-control" type="text" value="" id="teleponPelanggan" name="teleponPelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="custom1" class="font-weight-bold">Custom Field 1</label>
                            <input class="form-control" type="text" value="" id="custom1" name="custom1">
                        </div>
                        <div class="col-md-6">
                            <label for="custom2" class="font-weight-bold">Custom Field 2</label>
                            <input class="form-control" type="text" value="" id="custom2" name="custom2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Customer</button>
                </div>
            </div>
        </div>
    </div>
@endpush