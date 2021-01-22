<div class="d-flex row row-eq-height my-3">
    <div class="col-md-8">
        @include('pages.dashboard.card2-1')
        <div class="row row-eq-height">
            <div class="col-md-4">
                <div class="card my-3">
                    <div class="card-header white">
                        <strong> SOCIAL MEDIA </strong>
                    </div>
                    <div class="card-body">
                        <ul class="social">
                            <li>
                                <a href="{{ route('blank-page') }}" class="facebook mr-3">
                                    <i class="icon-facebook"></i>
                                </a> Facebook
                                <span class="float-right mt-2 font-weight-bold">10%</span>
                            </li>
                            <li>
                                <a href="{{ route('blank-page') }}" class="youtube mr-3">
                                    <i class="icon-youtube"></i>
                                </a>Youtube
                                <span class="float-right mt-2 font-weight-bold">20%</span>
                            </li>
                            <li>
                                <a href="{{ route('blank-page') }}" class="twitter mr-3">
                                    <i class="icon-twitter"></i>
                                </a>Twitter
                                <span class="float-right mt-2 font-weight-bold">50%</span>
                            </li>
                            <li>
                                <a href="{{ route('blank-page') }}" class="instagram mr-3">
                                    <i class="icon-instagram"></i>
                                </a>Instagram
                                <span class="float-right mt-2 font-weight-bold">5%</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-3">
                    <div class="card-header white">
                        <strong> Product </strong>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="my-3">$25,000</h3>
                            <i class="icon-angle-double-up yellow avatar avatar-lg"></i>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>
                                    <i class="icon-circle-o text-red mr-2"></i>Sales
                                </p>
                                <p>
                                    <i class="icon-circle-o text-green mr-2"></i>Last Month
                                </p>
                            </div>
                            <div>
                                <p>
                                    <i class="icon-angle-double-down text-red mr-2"></i>1,4,348
                                </p>
                                <p>
                                    <i class="icon-angle-double-up text-green mr-2"></i>1,11,5
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-3">
                    <div class="card-header white">
                        <strong> Progress </strong>
                    </div>
                    <div class="card-body pt-0">
                        <div class="my-3">
                            <small>25% Complete</small>
                            <div class="progress" style="height: 3px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="my-3">
                            <small>45% Complete</small>
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
    </div>
    @include('pages.dashboard.card2-2')
</div>