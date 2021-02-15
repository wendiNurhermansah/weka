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
            </li>
        </ul>
    </li>



</ul>
