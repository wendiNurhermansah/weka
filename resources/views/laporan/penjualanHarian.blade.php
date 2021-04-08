@extends('layouts.app')
@section('title', ' | Penjualan Harian')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-1"></i>
                        PENJUALAN HARIAN
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box blue r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-shopping-cart  s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum1)}}</h5>
                                    <div class="counter-title"  style="color:white;">Nilai Penjualan</div>
                                </div>
                            </div>
                        </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box orange r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-plus s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum2)}}</h5>
                                <div class="counter-title"  style="color:white;">Nilai Pembelian</div>
                                </div>
                            </div>
                       </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box red r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right"  style="color:white;">
                                        <span class="icon icon-chevron-circle-up s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum1)}}</h5>
                                    <h6 class="counter-title" style="color:white;">Nilai Biaya</h6>
                                </div>
                            </div>
                       </div>
                       <div class="col-md-3" style="cursor:pointer">
                            <div class="counter-box green r-5 p-3" style="height: 110%">
                                <div class="p-4">
                                    <div class="float-right" style="color:white;">
                                        <span class="icon icon-dollar s-48"></span>
                                    </div>
                                    <h5 class=" mt-3" style="color:white;">{{number_format($sum2)}}</h5>
                                    <h6 class="counter-title" style="color:white;">Untung</h6>
                                </div>
                            </div>
                       </div>
                    </div>

                    <div style="margin-top: 50px;">
                        <div class="container-fluid relative animatedParent animateOnce p-0">
                            <div class="white p-5" style="min-height:100px; max-height: 80vh;overflow:auto;border:none">
                                <div class="table-responsive" style="padding-right:5px;min-height:350px">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="calendarModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table border="2" class="table table-dark">
                <thead>
                    <tr>
                       <th>Total</th>
                       <th>Pajak</th>
                       <th>Pajak Pesanan</th>
                       <th>Diskon</th>
                       <th>Grand Total</th>
                       <th>Dibayar</th>
                       <th>Saldo</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($kategori1 as $item)
                    <tr>
                        <td id="total">{{$item->kode}}</td>
                        <td id="pajak"></td>
                        <td id="pajakPesanan"></td>
                        <td id="diskon"></td>
                        <td id="granTotal"></td>
                        <td id="dibayar"></td>
                        <td id="saldo"></td>
                    </tr>
                    @endforeach

                </tbody>



              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="icon icon-close ml-10 p-3"></i></button>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection


@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            height: 650,
            events: {!! json_encode($data) !!},
            eventColor: 'white',

        eventClick: function(info) {
            $('#calendarModal').modal();
            $('#modalTitle').html(info.event.title);
            // $('#modalTitle').val(info.event.data[0]['kode']);



    // alert('Event: ' + info.event.title);


    // change the border color just for fun
    info.el.style.borderColor = 'red';
  }

        });

        calendar.render();
        calendar.setOption('locale', 'id');

    });

</script>
@endsection
