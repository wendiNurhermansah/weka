<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="#">
            <i class="icon icon-dashboard2 blue-text s-18"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="header light"><strong>MASTER ROLES</strong></li>
    <li>
        <a href="{{ route('role.index') }}">
            <i class="icon icon-key4 amber-text s-18"></i>
            <span>Role</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('permission.index') }}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i>
            <span>Permission</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('pengguna.index') }}">
            <i class="icon icon-user blue-text s-18"></i>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="header light"><strong></strong></li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-apps text-lime s-18"></i> <span>Kategori</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{ route('Kategori.daftarkategori.index')}}">
                    <i class="icon icon-list red-text s-18"></i>
                    <span>Daftar Kategori</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{ route('Kategori.tambahkategori.index') }}">
                    <i class="icon icon-plus green-text s-18"></i>
                    <span>Tambahkan Kategori</span>
                </a>
            </li>
            <li class="no-b">
                <a href="#">
                    <i class="icon icon-download blue-text s-18"></i>
                    <span>Import Kategori</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-user text-lime s-18"></i> <span>Orang</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{route('Orang.pegawai.index')}}">
                    <i class="icon icon-users black-text s-18"></i>
                    <span>Daftar Pegawai</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.tambahpegawai')}}">
                    <i class="icon icon-plus red-text s-18"></i>
                    <span>Tambah Pegawai</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.pelanggan.index')}}">
                    <i class="icon icon-align-justify blue-text s-18"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.tambahpelanggan')}}">
                    <i class="icon icon-plus purple-text s-18"></i>
                    <span>Tambahkan Pelanggan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.pemasok.index')}}">
                    <i class="icon icon-list-ol yellow-text s-18"></i>
                    <span>Daftar Pemasok</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.tambahpemasok')}}">
                    <i class="icon icon-plus info-text s-18"></i>
                    <span>Tambahkan Pemasok</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="treeview ">
        <a href="#">
            <i class="icon icon-money text-lime s-18"></i> <span>Pembelian</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="#">
                    <i class="icon icon-list blue-text s-18"></i>
                    <span>Daftar Pembelian</span>
                </a>
            </li>
            <li class="no-b">
                <a href="#">
                    <i class="icon icon-plus black-text s-18"></i>
                    <span>Tambahkan Pembelian</span>
                </a>
            </li>
            <li class="no-b">
                <a href="#">
                    <i class="icon icon-list yellow-text s-18"></i>
                    <span>Daftar Biaya</span>
                </a>
            </li>
            <li class="no-b">
                <a href="#">
                    <i class="icon icon-plus red-text s-18"></i>
                    <span>Tambah Biaya</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
