@push('style')
    <style>
        .form-check-input:checked{
            content: "\f00c";
            font-family: 'FontAwesome';
        }
    </style>
@endpush

@push('modal')
    <div class="modal fade" id="modalDiskon" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content w-50 mx-auto">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Discount (5 or 5%)</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div id="alert"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="inputDiskon" name="inputDiskon" class="form-control" placeholder="" value="0" onclick="">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadio" id="orderTotal">
                        <label class="form-check-label" for="orderTotal">Apply to order total</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadio" id="allOrder">
                        <label class="form-check-label" for="allOrder">Apply to all order items</label>
                      </div>
                    {{-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="orderTotal">
                        <label class="form-check-label" for="orderTotal">Apply to order total</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="allOrder">
                        <label class="form-check-label" for="allOrder">Apply to all order items</label>
                    </div> --}}
                </div> 
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-light mr-auto border" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateDiskon()" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
<script>
    $("#inputDiskon").keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9.%]/g)) return false;
        // makeUnique($("#inputDiskon").val()); 

        // var areUnique = true;
        // $.each($("#inputDiskon",function(){
        //     var val = $(this).val();
        //     $.each($("#inputDiskon",function(){
        //          if(val == $(this).val()){areUnique = false;}
        //     }));
        // }));

        var keyCode = e.which;
        if ( keyCode == 46 || keyCode == 37) { 
            var nyot = []
            var tmpTitik = 0;
            var tmpDiskon = 0;

            nyot.push($('#inputDiskon').val());
            console.log(nyot)
            var nyet = $('#inputDiskon').val().length;
            console.log('nyet='+nyet)

            for (i = 0; i < nyet; i++) {
                if(nyot[i] == '.'||nyot[i] == '%'){
                    if(tmpTitik==1 || tmpDiskon==1){
                        return false;   
                        event.preventDefault();    
                    }
                    tmpTitik++;
                    console.log('titik='+tmpTitik)
                    tmpDiskon++;
                    console.log('Diskon='+tmpDiskon)
                }
            //    nyat.push(nyot[i])
            //    console.log(nyat);
            //    if(nyat.length>1){
            //        console.log(nyat);
            //        return false;
            //    }
            }
        }
    });

    $('#orderTotal :checkbox').change(function() {
        if (this.checked) {
            $('#allOrder').remove('checked')
        } 
    });
    $('#allOrder :checkbox').change(function() {
        if (this.checked) {
            $('#orderTotal').remove('checked')
        } 
    });

    // $("#inputDiskon").keypress(function(e){
    //     var keyCode = e.which;
    //     if ( keyCode == 46 || keyCode == 37) { 
    //         var nyot = []
    //         var tmpTitik = 0;
    //         var tmpDiskon = 0;

    //         nyot.push($('#inputDiskon').val());
    //         console.log('nyot='.nyot)
    //         var nyet = $('#inputDiskon').val().length;
    //         console.log('nyot='.nyet)

    //         for (i = 0; i < nyet; i++) {
    //             if(nyot[i] == '.'||nyot[i] == '%'){
    //                 if(tmpTitik>0 || tmpDiskon>0){
    //                     return false    
    //                 }
    //                 tmpTitik++;
    //                 console.log('titik='.titik)
    //                 tmpDiskon++;
    //                 console.log('Diskon='.diskon)
    //             }
    //         //    nyat.push(nyot[i])
    //         //    console.log(nyat);
    //         //    if(nyat.length>1){
    //         //        console.log(nyat);
    //         //        return false;
    //         //    }
    //         }
    //     }
    // });

    // $('#inputDiskon').keyup(function(){
    //     var nyot = []
    //     nyot.push($('#inputDiskon').val());
    //     var nyet = $('#inputDiskon').val().length;
    //     console.log(nyet);
    //     console.log(nyot);
    //     console.log('break');

    //     var inputDiskon = $('#inputDiskon').val();
    //     var keyCode = inputDiskon.which;
    //     if(keyCode == 46 || keyCode == 37){
    //         console.log(keyCode)
    //         if(tmpDiskon>0||tmpTitik>0){return false;}
    //         tmpDiskon++;
    //         tmpTitik++;
    //     }
        
    //     // $("#age").keypress(function(){
    //     //     var keyCode = e.which;
        
    //     //     if ( (keyCode) { 
    //     //         return false;
    //     //     }
    //     // });
    //     // for (i = 0; i < nyet; i++) {
    //     //     if(nyot[i] == 46 || nyot[i] == 37){
    //     //        nyat.push(nyot[i])
    //     //        console.log(nyat);
    //     //        if(nyat.length>1){
    //     //            console.log(nyat);
    //     //            return false;
    //     //        }
    //     //     }
    //     // }

    // });

    var nyet = $('#inputDiskon').val();
        console.log(nyet);
        
    $("#nilaiDiskon").html('0');
    $("#hasilDiskon").html('0');

    function updateDiskon()
        {
            var diskon = $('#inputDiskon').val();

            all = $('#allOrder').prop('checked')
            
            total = $('#orderTotal').prop('checked')
            count = $('#appendd tr').length;
            if(all){
                // console.log('sini',count)
                
            }else if(total){
                // console.log('sono',count)
                $('#nilaiDiskon').html(diskon);
                var total = $('#tabelTotal').text();
                hasilDiskon = total * diskon / 100 ;
                $('#hasilDiskon').html(hasilDiskon);
            }else{
                $('#alert').html("<div role='alert' class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Pilih Diskon atau Close</strong></div>")
                updateDiskon()
            }

            
            
            
            // 100  
            
            // 10
            
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