@extends('layouts.app')
@section('title', ' | Laporan Produk')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        LAPORAN PRODUK
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
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th width="30">NO</th>
                            <th>Nama</th>
                            <th>Terjual</th>
                            <th>Biaya</th>
                            <th>Penghasilan</th>
                            <th>Untung</th>

                        </thead>
                        <tbody></tbody>
                        <tfoot >
                            <th></th>
                            <th>[Nama]</th>
                            <th>
                                <span>0</span>
                            </th>
                            <th>
                                <span>0</span>
                            </th>
                            <th>
                                <span>0</span>
                            </th>
                            <th>
                                <span>0</span>
                            </th>
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
            var Terjual = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var biaya = api
                .column(3)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var Penghasilan = api
                .column(4)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var Untung = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


            // Update footer by showing the total with the reference of the column index

            $( api.column( 2 ).footer() ).html(Terjual);
            $( api.column( 3 ).footer() ).html(biaya);
            $( api.column( 4 ).footer() ).html(Penghasilan);
            $( api.column( 5 ).footer() ).html(Untung);

        },
            processing: true,
            serverSide: true,
            pageLength: 15,
            order: [ 0, 'asc' ],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            ajax: {
                url: "{{ route('Laporan.laporanProduk.apii') }}",
                method: 'POST'
            },

            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
                {data: 'nama', name: 'nama'},
                {data: 'total', name: 'total'},
                {data: 'biaya', name: 'biaya'},
                {data: 'penghasilan', name: 'penghasilan'},
                {data: 'biaya_satuan', name: 'biaya_satuan'}

            ]
    });
</script>

@endsection
