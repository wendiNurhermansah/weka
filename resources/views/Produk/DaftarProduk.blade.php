@extends('layouts.app')
@section('title', 'Produk')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-store_mall_directory"></i>
                        List Produk
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 mb-5">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <h3>Silakan gunakan tabel di bawah ini untuk menavigasi atau memfilter hasil.</h3>
    </div>



        <table id="example" class="display bg-white text-dark" style="width:100%">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Kuantitas</th>
                <th>Biaya</th>
                <th>Harga</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $product)
            <tr>
                {{-- <td>{{$product->gambar}}</td> --}}
                <td><img src="produk/images/ava/{{$product->gambar}}" alt="" width='100'></td>
                <td>{{$product->nama}}</td>
                <td>{{$product->kategori}}</td>
                <td>{{$product->kuantitas}}</td>
                <td>{{$product->biaya}}</td>
                <td>{{$product->harga}}</td>
                <td>
                <div class="btn btn-primary">
                    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 30px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <img id="photo_" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 30px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <div>
                                        <img id="photo_" alt="">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                {{-- <a href="produk/images/ava/{{$product->gambar}}" class="btn btn-primary" ><i class="far fa-image"></i></a> --}}
                <a href="/product/{{ $product->id }}/edit" class="btn btn-primary" >Edit</a>
                    <form action="/product/{{$product->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
    $('#example').dataTable( {
    dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
    </script>

<script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        pageLength: 15,
        order: [ 0, 'asc' ],

        ajax: {
            url: "{{ route('product.api') }}",
            method: 'POST'
        },

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'referensi', name: 'referensi'},
            {data: 'total', name: 'total'},
            {data: 'catatan', name: 'catatan'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]

        function show(id){
        $('#modal2').modal('show');
        $.get("{{ route('Kategori.daftarkategori.showDataModal', ':id') }}".replace(':id', id), function(data){
            var path = "{{ asset('/produk/images/ava') }}"+ "/" + data.gambar;
            console.log(data.gambar)
            $('#photo_').attr({'src': path});
        }, "JSON").fail(function(){
            reload();
        });

    }

</script>

@endsection

