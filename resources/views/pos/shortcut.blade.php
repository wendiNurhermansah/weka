@push('modal')
    <div class="modal fade" id="shortcut" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-black modal-title">Shortcut Key</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Shortcut Keys</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($pengaturan as $p)                
                                    <tr>
                                        <td>{{$p->fokus_tambahkan_cari_input_barang}}</td>
                                        <td>fokus_tambahkan_cari_input_barang</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->tambahkan_pelanggan}}</td>
                                        <td>tambahkan_pelanggan</td> 
                                    </tr>
                                    <tr>
                                        <td>{{$p->toggle_category_slider}}</td>
                                        <td>toggle_category_slider</td>  
                                    </tr>
                                    <tr>
                                        <td>{{$p->batalkan_penjualan}}</td>
                                        <td>batalkan_penjualan</td>
                                    </tr> 
                                    <tr>
                                        <td>{{$p->tangguhkan_penjualan}}</td>
                                        <td>tangguhkan_penjualan</td>    
                                    </tr>
                                    <tr>
                                        <td>{{$p->cetak_pesanan}}</td>                        
                                        <td>cetak_pesanan</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->cetak_bill}}</td>                         
                                        <td>cetak_bill</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->finalisasi_penjualan}}</td>
                                        <td>finalisasi_penjualan</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->penjualan_hari_ini}}</td>
                                        <td>penjualan_hari_ini</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->tagihan_terbuka}}</td>
                                        <td>tagihan_terbuka</td>
                                    </tr>
                                    <tr>
                                        <td>{{$p->tutup_penjualan}}</td>
                                        <td>tutup_penjualan</td>
                                    </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('script')
<script>
    $(document).ready(function () {
        $(document).keyup(function(e){
                    if(e.which === 65){
                        console.log('kpeencet');
                    }
                }); 
    });
</script>
@endpush