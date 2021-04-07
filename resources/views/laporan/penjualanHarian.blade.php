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
                        <div class="col-lg-3">
                            <div class="blue counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-shopping-cart s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated text" style="color:white;" >1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Penjualan</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="orange counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-plus s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Pembelian</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="red counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-chevron-circle-up s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Nilai Biaya</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="green counter-box p-40">
                                <div class="float-right" style="color:white;">
                                    <span class="icon icon-dollar s-48"></span>
                                </div>
                                <div class="sc-counter s-36 counter-animated" style="color:white;">1,200</div>
                                <h6 class="counter-title" style="color:white;">Untung</h6>
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
              <p>Modal body text goes here.</p>
              <p id="modalTitle"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            events: [ {
                title  : 'wendi',
                start  : '2021-04-01'
                },
                {
                title  : 'event2',
                start  : '2021-04-05',
                end    : '2021-04-07'
                },
                {
                title  : 'event3',
                start  : '2021-04-09T12:30:00',
                allDay : false // will make the time show
            }],

        //     eventClick:  function(event, jsEvent, view) {
        //         console.log(event);
        //     $('#modalTitle').html(event.title);

        //     $('#calendarModal').modal();
        // },
        eventClick: function(info) {
            $('#calendarModal').modal();
            $('#modalTitle').html(info.event.title);
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
