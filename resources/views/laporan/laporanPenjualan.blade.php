@extends('layouts.app')
@section('title', ' | Laporan Penjualan')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        LAPORAN PENJUALAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif



        <div class="card">
            {{-- <div class="container" style="text-align: right; margin-top: 10px;">
                  <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Tammpilkan / Sembunyikan Folmulir
                  </button>

                <div class="collapse" id="collapseExample" style="margin-top: 20px; text-align: left;">
                  <div class="card card-body">
                    <form class="needs-validation" id="form" method="POST"  novalidate>
                        {{ method_field('POST') }}
                        <input type="hidden" id="id" name="id"/>
                        <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="tanggal">Pelanggan</label>
                                    <div class=" p-0 bg-light">
                                        <select class="select2 form-control r-0 light s-12" name="group" id="group" autocomplete="off">
                                            <option value="Diterima">Diterima</option>
                                            <option value="Belum Diterima">Belum Diterima</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tanggal">Pengguna</label>
                                    <div class=" p-0 bg-light">
                                        <select class="select2 form-control r-0 light s-12" name="group" id="group" autocomplete="off">
                                            <option value="Diterima">Diterima</option>
                                            <option value="Belum Diterima">Belum Diterima</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tanggal">Tanggal Mulai</label>
                                    <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{ old('tanggal') }}" required>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tanggal">Tanggal Berakhir</label>
                                    <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="" name="tanggal" value="{{ old('tanggal') }}" required>

                                </div>
                                <div class="" style="margin: 20px;">
                                    <button type="submit" class="btn btn-primary btn-sm" id="action">Submit<span id="txtAction"></span></button>
                                </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div> --}}

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th width="30">NO</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Pajak</th>
                            <th>Diskon</th>
                            <th>Grand Total</th>
                            <th>Dibayar</th>
                            <th>Status</th>

                        </thead>
                        <tbody></tbody>
                        <tfoot class="table-active">
                            <tr>
                                <th></th>
                              <th>[Tanggal]</th>
                              <th>[Pelanggan]</th>
                              <th><span>{{$total}}</span></th>
                              <th><span>{{$pajak}}</span></th>
                              <th>
                                  <span>{{$diskon}}</span>
                              </th>
                              <th>
                                <span>0.00</span>
                            </th>
                            <th>
                                <span>0.00</span>
                            </th>
                            <th>[Status]</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var table = $('#dataTable').dataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // computing column Total of the complete result
            var grandTotal = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var dibayar = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


            // Update footer by showing the total with the reference of the column index

            $( api.column( 6 ).footer() ).html(grandTotal);
            $( api.column( 7 ).footer() ).html(dibayar);

        },
            processing: true,
            serverSide: true,
            pageLength: 15,
            order: [ 0, 'asc' ],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            ajax: {
                url: "{{ route('Laporan.laporanPenjualan.api') }}",
                method: 'POST'
            },

            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'created_at', name: 'created_at'},
                {data: 'pelanggan_id', name: 'pelanggan_id'},
                {data: 'total', name: 'total'},
                {data: 'pajak', name: 'pajak'},
                {data: 'diskon', name: 'diskon'},
                {data: 'grandTotal', name: 'grandTotal'},
                {data: 'dibayar', name: 'dibayar'},
                {data: 'status', name: 'status'},
            ]

    });




</script>

@endsection
