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



        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Ketik</th>
                <th>Kategori</th>
                <th>Kuantitas</th>
                <th>Pajak</th>
                <th>Metode</th>
                <th>Biaya</th>
                <th>Harga</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $product)
            <tr>
                <td>UNTUK GAMBAR</td>
                <td>{{$product->nama}}</td>
                <td>{{$product->ketik}}</td>
                <td>{{$product->kategori}}</td>
                <td>{{$product->kuantitas}}</td>
                <td>{{$product->pajak}}</td>
                <td>{{$product->metode}}</td>
                <td>{{$product->biaya}}</td>
                <td>{{$product->harga}}</td>
                <td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
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
        });

</script>

@endsection

