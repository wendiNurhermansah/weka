@push('modal')
    <div class="modal fade" id="pelanggan" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Tambahkan Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="" id="formPelanggan" method="POST"  novalidate>
                    @csrf
                    <div class="modal-body">
                        <div id="alertPelanggan"></div>
                        <div class="form-group">
                             <label for="namaPelanggan" class="font-weight-bold">Name</label>
                             <input class="form-control  @error('nama') is-invalid @enderror" type="text" value="" id="nama" name="nama" required>
                         </div>
                         <div class="form-group row">
                             <div class="col-md-6">
                                 <label for="emailPelanggan" class="font-weight-bold">Email</label>
                                 <input class="form-control @error('email') is-invalid @enderror" type="email" value="" id="email" name="email" required>
                             </div>
                             <div class="col-md-6">
                                 <label for="teleponPelanggan" class="font-weight-bold">Telepon</label>
                                 <input class="form-control @error('telepon') is-invalid @enderror" type="text" value="" id="telepon" name="telepon" required>
                             </div>
                         </div>
                         <div class="form-group row">
                             <div class="col-md-6">
                                 <label for="custom1" class="font-weight-bold">Custom Field 1</label>
                                 <input class="form-control" type="text" value="" id="ccf_1" name="ccf_1">
                             </div>
                             <div class="col-md-6">
                                 <label for="custom2" class="font-weight-bold">Custom Field 2</label>
                                 <input class="form-control" type="text" value="" id="ccf_2" name="ccf_2">
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary" onclick="add()">Add Customer</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script type="text/javascript">
        function add(){
            save_method = "add";
            $('input[name=_method]').val('POST');
        }
        
        $( "#cariPelanggan" ).autocomplete({
                    source: function( request, response ) {
                        // Fetch data
                        $.ajax({
                        url:"{{route('Pos.cariPelanggan')}}",
                        type: 'post',
                        dataType: "json", 
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            if(data[0] == null){
                                data[0] = 'Data tidak ditemukan'
                            }
                            response( data );
                        }
                        });
                    },
                    select: function (event, ui) {
                       // Set selection
                        $('#cariPelanggan').val(ui.item.label); // display the selected text
                        $('#idPelanggan').val(ui.item.value); // save selected id to input
                        return false;
                    }

        });

        $('#formPelanggan').on('submit', function (e) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            else{
                // alert('masuk data')
                $('#alert').html('');
                url = "{{ route('Orang.pelanggan.store') }}",
                $.ajax({
                    url : url,
                    type : 'POST',
                    data: new FormData(($(this)[0])),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        console.log(data);
                        $('#alertPelangggan').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                        add();
                        $('#pelanggan').modal('toggle')
                    },
                    error : function(data){
                        err = '';
                        respon = data.responseJSON;
                        if(respon.errors){
                            $.each(respon.errors, function( index, value ) {
                                err = err + "<li>" + value +"</li>";
                            });
                        }
                        $('#alertPelanggan').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                    }
                });
                return false;
            }
            $(this).addClass('was-validated');
        });
    </script>
@endpush