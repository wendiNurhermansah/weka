
<div class="card">
    <div class="card-header white">
        <div class="row justify-content-end">
            <div class="col">
                <ul class="nav nav-tabs card-header-tabs nav-material">
                    <li class="nav-item">
                        <a class="nav-link active show" id="w1-tab1" data-toggle="tab" href="#v-pills-w1-tab1">Today</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="w1-tab2" data-toggle="tab" href="#v-pills-w1-tab2">Yesterday</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body no-p">
        <div class="tab-content">
            <div class="tab-pane animated fadeInRightShort show active" id="v-pills-w1-tab1" role="tabpanel" aria-labelledby="v-pills-w1-tab1">
                <div class="row p-3">
                    <div class="col-md-6">
                        <div class="">
                            <div style="height: 328px">
                                <canvas data-chart="chartJs"
                                        data-chart-type="pie"
                                        data-dataset="[[75, 50], [25, 50]]"
                                        data-labels="[['Disk'],['Database']]"
                                        data-dataset-options="[
                                            {
                                                label: 'Disk',
                                                backgroundColor: ['#4285F4', '#7DC855']
                                            },
                                            {
                                                label: 'Database',
                                                backgroundColor: ['#FFEB3B', '#36A2EB']
                                            },
                                        ]">
                                </canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body pt-0">
                            <h6>Top Countries</h6>
                            <div class="my-3">
                                <div class="float-right">
                                    <a href="{{ route('blank-page') }}" class="btn-fab btn-fab-sm btn-primary r-5">
                                        <i class="icon-mail-envelope-closed2 p-0"></i>
                                    </a>
                                    <a href="{{ route('blank-page') }}" class="btn-fab btn-fab-sm btn-success r-5">
                                        <i class="icon-star p-0"></i>
                                    </a>
                                </div>
                                <div class="mr-3 float-left">
                                    <i class="icon-angle-double-up bg-primary text-center avatar mt-1"></i>
                                </div>
                                <div>
                                    <div>
                                        <strong>United Kingdom</strong>
                                    </div>
                                    <small>5000+ Visitor in a month</small>
                                </div>
                            </div>
                            <div class="my-3">
                                <small>25% US Visitors</small>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="my-3">
                                <small>45% UK Visitors</small>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="my-3">
                                <small>60% Complete</small>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="my-3">
                                <small>75% Complete</small>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="my-3">
                                <small>100% Complete</small>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInLeftShort" id="v-pills-w1-tab2" role="tabpanel" aria-labelledby="v-pills-w1-tab2">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>