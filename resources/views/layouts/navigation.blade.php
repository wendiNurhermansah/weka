<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="#">
            <i class="icon icon-dashboard2 blue-text s-18"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @can('master-role')
    <li class="header light"><strong>MASTER ROLES</strong></li>
    <li>
        <a href="#">
            <i class="icon icon-key4 amber-text s-18"></i>
            <span>Role</span>
        </a>
    </li>
    <li class="no-b">
        <a href="#">
            <i class="icon icon-clipboard-list2 text-success s-18"></i>
            <span>Permission</span>
        </a>
    </li>
    <li class="no-b">
        <a href="#">
            <i class="icon icon-users blue-text s-18"></i>
            <span>Pengguna</span>
        </a>
    </li>
    @endcan
   
</ul>
