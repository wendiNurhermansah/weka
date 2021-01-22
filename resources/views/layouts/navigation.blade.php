<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{ route('home') }}">
            <i class="icon icon-dashboard2 blue-text s-18"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @can('master-role')
    <li class="header light"><strong>MASTER ROLES</strong></li>
    <li>
        <a href="{{ route('master-role.role.index') }}">
            <i class="icon icon-key4 amber-text s-18"></i>
            <span>Role</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-role.permission.index') }}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i>
            <span>Permission</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-role.pengguna.index') }}">
            <i class="icon icon-users blue-text s-18"></i>
            <span>Pengguna</span>
        </a>
    </li>
    @endcan
    @can('master-jenis')
    <li class="header light"><strong>MASTER JENIS</strong></li>
    <li>
        <a href="{{ route('master-jenis.jenisLapak.index') }}">
            <i class="icon icon-store_mall_directory text-danger s-18"></i>
            <span>Jenis Lapak</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-jenis.jenisUsaha.index') }}">
            <i class="icon icon-store_mall_directory purple-text s-18"></i>
            <span>Jenis Usaha</span>
        </a>
    </li>
    @endcan
    @can('master-pedagang')
    <li class="header light"><strong>MASTER PEDAGANG</strong></li>
    <li>
        <a href="{{ route('master-pedagang.pedagang.index') }}">
            <i class="icon icon-address-card-o amber-text s-18"></i>
            <span>Pedagang</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-pedagang.pedagangAlamat.index') }}">
            <i class="icon icon-address-card-o text-success  s-18"></i>
            <span>Pedagang Alamat</span>
        </a>
    </li>
    @endcan
    @can('master-pasar')
    <li class="header light"><strong>MASTER PASAR</strong></li>
    <li>
        <a href="{{ route('master-pasar.pasar.index') }}">
            <i class="icon icon-local_convenience_store text-danger s-18"></i>
            <span>Pasar</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-pasar.pasarKategori.index') }}">
            <i class="icon icon-local_convenience_store text-primary s-18"></i>
            <span>Pasar Kategori</span>
        </a>
    </li>
    @endcan
    @can('master-transaksi')
    <li class="header light"><strong>MASTER TRANSAKSI</strong></li>
    <li>
        <a href="{{ route('master-transaksi.transaksi.index') }}">
            <i class="icon icon-dollar amber-text s-18 mr-2"></i>
            <span>Transaksi</span>
        </a>
    </li>
    @endcan
</ul>
