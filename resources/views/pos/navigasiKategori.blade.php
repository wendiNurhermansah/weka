@push('modal')
    <aside class="control-sidebar fixed bg-dark">
        <div class="slimScroll">
            <div class="p-3">
                <input id="cariKategori" type="text" class="form-control col-md-11">
                <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active col-md-2"><i></i></a>
                <div id="hasilKategori"  class="">
                </div>
            </div>
        </div>
    </aside>
@endpush

@push('script')
    <script type="text/javascript">
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // $(document).ready(function () {
        //     $( "#cariKategori" ).autocomplete({
        //             source: function( request, response ) {
        //                 // Fetch data
        //                 $.ajax({
        //                 url:"{{route('Pos.cariKategori')}}",
        //                 type: 'get',
        //                 dataType: "json",
        //                 data: {
        //                     _token: CSRF_TOKEN,
        //                     search: request.term
        //                 },
        //                 success: function( data ) {
        //                     response( data );
        //                 }
        //                 });
        //             },
        //             select: function (event, ui) {
        //                 // Set selection
        //                 event.preventDefault();
        //                 $("#cariKategori").val(ui.item.label); // display the selected text
        //                 $("#hasilKategori").html(ui.item.label)
        //                 window.location.href = ui.item.value;
        //             },
        //             focus: function (event, ui) {
        //                 event.preventDefault();
        //                 $("#cariKategori").val(ui.item.label);
        //             }
        //     });
        // });

            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#cariKategori').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('Pos.cariKategori') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'kategori':query},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#hasilKategori').html(data);
                        }
                    })
                    // end of ajax call
                });
            });
    </script>
@endpush