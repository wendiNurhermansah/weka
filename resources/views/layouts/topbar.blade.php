<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <div class="d-flex">
                    <div>
                        <a href="{{ route('blank-page') }}" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
                    <div class="row m-t-12">
                        <li type="none" class="mr-1 ml-2 fs-13 text-white">
                            <i class="icon icon-calendar-check-o"></i>
                            <a id="hari"></a>
                            ,
                            <a id="tanggal"></a>
                            <a id="bulan"></a>
                            <a id="tahun"></a>
                            /
                        </li>
                        <li type="none" class="fs-13 text-white">
                            <a id="jam"></a>
                            :
                            <a id="menit"></a>
                            :
                            <a id="detik"></a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages -->
                    <li class="dropdown custom-dropdown messages-menu">
                        <a href="{{ route('blank-page') }}" class="nav-link" data-toggle="dropdown">
                            <i class="icon-message "></i>
                            <span class="badge badge-success badge-mini rounded-circle">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <ul class="menu pl-2 pr-2">
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <div class="avatar float-left">
                                                <img src="{{ asset('assets/img/dummy/u4.png') }}" alt="">
                                                <span class="avatar-badge busy"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <div class="avatar float-left">
                                                <img src="{{ asset('assets/img/dummy/u3.png') }}" alt="">
                                                <span class="avatar-badge online"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <div class="avatar float-left">
                                                <img src="{{ asset('assets/img/dummy/u2.png') }}" alt="">
                                                <span class="avatar-badge idle"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <div class="avatar float-left">
                                                <img src="{{ asset('assets/img/dummy/u1.png') }}" alt="">
                                                <span class="avatar-badge busy"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer s-12 p-2 text-center"><a href="{{ route('blank-page') }}">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications -->
                    <li class="dropdown custom-dropdown notifications-menu">
                        <a href="{{ route('blank-page') }}" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-notifications "></i>
                            <span class="badge badge-danger badge-mini rounded-circle">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blank-page') }}">
                                            <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer p-2 text-center"><a href="{{ route('blank-page') }}">View all</a></li>
                        </ul>
                    </li>
                    <!-- Profile -->
                    <li class="dropdown custom-dropdown user user-menu ">
                        <a href="{{ route('blank-page') }}" class="nav-link" data-toggle="dropdown">
                            <img src="{{ asset('images/ava/' . Auth::user()->admin_detail[0]->foto) }}" class="rounded-circle img-circular" style="margin-top: -10px" width="30" height="30">
                            <i class="icon-more_vert "></i>
                        </a>
                        <div class="dropdown-menu p-4 dropdown-menu-right" style="width:255px">
                            <div class="box justify-content-between">
                                <div class="col">
                                    <a href="{{ route('master-profile.profile.index') }}">
                                        <i class="icon-user amber-text lighten-2 avatar r-5"></i>
                                        <div class="pt-1">Profil</div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action mt-2"><i class="mr-2 icon-power-off text-danger"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    // Hours
    window.setTimeout("waktu()", 1000);

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = addZero(waktu.getHours());
        document.getElementById("menit").innerHTML = addZero(waktu.getMinutes());
        document.getElementById("detik").innerHTML = addZero(waktu.getSeconds());
    }

    // Day
    arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]
    Hari = new Date().getDay();
    document.getElementById("hari").innerHTML = arrHari[Hari];

    // Date
    Tanggal = new Date().getDate();
    document.getElementById("tanggal").innerHTML = Tanggal;

    // Month
    arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    Bulan = new Date().getMonth();
    document.getElementById("bulan").innerHTML = arrbulan[Bulan];

    // Year
    Tahun = new Date().getFullYear();
    document.getElementById("tahun").innerHTML = Tahun;

</script>