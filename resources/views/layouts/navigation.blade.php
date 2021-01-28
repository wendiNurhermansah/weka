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
            <i class="icon icon-users blue-text s-18"></i>
            <span>Pengguna</span>
        </a>
    </li>

    <li class="header light"><strong>KATEGORI</strong></li>
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
