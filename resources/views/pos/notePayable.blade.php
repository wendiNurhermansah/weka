@push('modal')
    <div class="modal fade" id="modalNotePayable" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Note</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" value="" id="notePayable" name="notePayable">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="fungsiNotePayable()">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script>
        function fungsiNotePayable(){
        $('#modalNotePayable').modal('toggle');
        note = $('#notePayable').val();
        $('#noteSebelumPembayaran').val(note);
        // $("#notePayable").val()
        }
    </script>
@endpush