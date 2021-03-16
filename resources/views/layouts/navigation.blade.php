<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{url('/dashboard')}}">
            <i class="icon icon-dashboard2 blue-text s-18"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @can('Role')
    <li class="treeview ">
        <a href="#">
            <i class="header icon icon-package text-lime s-18"></i> <span>MASTER ROLES</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('role.index') }}"><i class="icon icon-key4 amber-text s-18"></i>Role</a>
            </li>
            <li><a href="{{ route('permission.index') }}"><i class="icon icon-clipboard-list2 text-success s-18"></i>Permission</a>
            </li>
            <li><a href="{{ url('pengguna.index') }}"><i class="icon icon-user blue-text s-18"></i>Pengguna</a>
        </ul>
    </li>

    {{-- <li class="header light"><strong>MASTER ROLES</strong></li>
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
    </li> --}}

    @endcan

    {{-- mater transaksi --}}
    @can('Umum')

    <li class="header light"><strong>MASTER TRANSAKSI</strong></li>

    <li class="treeview">
        <a href="{{ route('Pos.main.index')}}">
            <i class="icon icon-apps s-18"></i>
            <span>POS</span>
        </a>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-package text-lime s-18"></i> <span>Produk</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('product') }}"><i class="icon icon-circle-o"></i>Daftar Produk</a>
            </li>
            <li><a href="{{ url('tambahproduk') }}"><i class="icon icon-circle-o"></i>Tambahkan Produk</a>
            </li>
            <li><a href="{{ url('importproduk') }}"><i class="icon icon-circle-o"></i>Import Produk</a>
        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-folder-open text-lime s-18"></i> <span>Kategori</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{ route('Kategori.daftarkategori.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Kategori</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{ route('Kategori.import.index') }}">
                    <i class="icon icon-circle-o"></i>
                    <span>Import Kategori</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{ route('Kategori.tambahkategori') }}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambahkan Kategori</span>
                </a>
            </li>

        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-folder-open text-lime s-18"></i> <span>Penjualan</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{ route('Orang.pegawai.index')}}">
                    <i class="icon icon-list red-text s-18"></i>
                    <span>Daftar Penjualan</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{ route('Orang.pegawai.index') }}">
                    <i class="icon icon-list blue-text s-18"></i>
                    <span>Daftar Opened Bills</span>
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
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Pegawai</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{route('Orang.pelanggan.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{route('Orang.pemasok.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Pemasok</span>
                </a>
            </li>


            <li class="no-b">
                <a href="{{route('Orang.tambahpegawai')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambah Pegawai</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.tambahpelanggan')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambahkan Pelanggan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Orang.tambahpemasok')}}">
                    <i class="icon icon-circle-o"></i>
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
                <a href="{{route('Pembelian.pembelian.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Pembelian</span>
                </a>
            </li>

            <li class="no-b">
                <a href="{{route('Pembelian.biaya.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Biaya</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Pembelian.tambahPembelian')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambahkan Pembelian</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Pembelian.tambahbiaya')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambah Biaya</span>
                </a>
            </li>
        </ul>
    </li>




    <li class="treeview ">
        <a href="#">
            <i class="icon icon-payment text-lime s-18"></i> <span>Kartu Hadiah</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{route('Hadiah.hadiah.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Daftar Kartu Hadiah</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Hadiah.tambahHadiah')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambahkan Kartu Hadiah</span>
                </a>
            </li>

        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-analytics text-lime s-18"></i> <span>Laporan</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{route('Laporan.PenjualanHarian')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Penjualan Harian</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.PenjualanBulanan')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Penjualan Bulanan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.laporanPenjualan.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Laporan Penjualan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.laporanPembayaran')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Laporan Pembayaran</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.laporanPendaftaran')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Laporan Pendaftaran</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.produkTeratas')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Produk Teratas</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{route('Laporan.laporanProduk')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Laporan Produk</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview ">
        <a href="#">
            <i class="icon icon-payment text-lime s-18"></i> <span>Pengaturan</span>
            <i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="no-b">
                <a href="{{route('pengaturan.main.index')}}">
                    <i class="icon icon-circle-o"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{ route('pengaturan.toko.index') }}">
                    <i class="icon icon-circle-o"></i>
                    <span>Toko</span>
                </a>
            </li>
            <li class="no-b">
                <a href="{{ route('Kategori.tambahkategori') }}">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambah Toko</span>
                </a>
            </li>
            <li class="no-b">
                <a href="">
                    <i class="icon icon-circle-o"></i>
                    <span>Printer</span>
                </a>
            </li>
            <li class="no-b">
                <a href="">
                    <i class="icon icon-circle-o"></i>
                    <span>Tambah Printer</span>
                </a>
            </li>
            <li class="no-b">
                <a href="">
                    <i class="icon icon-circle-o"></i>
                    <span>Backup</span>
                </a>
            </li>
        </ul>
    </li>


    @endcan
</ul>

