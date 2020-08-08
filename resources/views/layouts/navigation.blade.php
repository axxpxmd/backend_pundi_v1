<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{ route('home') }}">
            <i class="icon icon-sailing-boat-water purple-text s-18"></i> 
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Master Role -->
    @can('master-role')
    <li class="header light"><strong>MASTER ROLE</strong></li>
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
    <li class="header light"><strong>MASTER CONFIG</strong></li>
    <li class="treeview">
        <a href="#">
            <i class="icon icon-settings light-blue-text s-18"></i> 
            <span>Config</span><i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{ route('master-config.app.index') }}">
                    <i class="icon icon-settings2"></i><span>Config App</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="icon icon-settings2"></i><span>Config Home</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="icon icon-settings2"></i><span>Config Auth</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="icon icon-settings2"></i><span>Config Theme</span>
                </a>
            </li>
        </ul>
    </li>
    @endcan
    <!-- Master Pengguna -->
    @can('master-pengguna')
    <li class="header light"><strong>MASTER PENGGUNA</strong></li>
    @endcan
    <!-- Master API -->
    @can('master-api')
    <li class="header light"><strong>MASTER API</strong></li>
    @endcan
    <!-- Master Mobile -->
    @can('master-mobile')
    <li class="header light"><strong>MASTER MOBILE</strong></li>
    @endcan
</ul>
