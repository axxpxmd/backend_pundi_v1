<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{ route('home') }}">
            <i class="icon icon-dashboard2 blue-text s-18"></i> 
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Master Role -->
    <li class="header light"><strong>MASTER ROLE</strong></li>
    <li>
        <a href="{{ route('master-role.role.index') }}">
            <i class="icon icon-key4 amber-text s-18"></i> 
            <span>Role</span>
        </a>
    </li>
    <li class="no-b">
        <a>
            <i class="icon icon-clipboard-list2 text-success s-18"></i> 
            <span>Permission</span>
        </a>
    </li>
    <li class="no-b">
        <a>
            <i class="icon icon-users blue-text s-18"></i> 
            <span>Pengguna</span>
        </a>
    </li>
    {{-- <li class="header light"><strong>MASTER USER</strong></li>
    <li class="no-b">
        <a>
            <i class="icon icon-user blue-text s-18"></i> 
            <span>User</span>
        </a>
    </li>
    <li class="header light"><strong>MASTER USER </strong></li>
    <li class="no-b">
        <a>
            <i class="icon icon-user blue-text s-18"></i> 
            <span>User</span>
        </a>
    </li> --}}
</ul>
