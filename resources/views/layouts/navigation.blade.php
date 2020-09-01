<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{ route('home') }}">
            <i class="icon icon-dashboard2 blue-text s-18"></i> 
            <span>Dashboard</span>
        </a>
    </li>
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
    <li class="no-b">
        <a href="{{ route('master-role.pegawai.index') }}">
            <i class="icon icon-users blue-text s-18"></i> 
            <span>Pegawai</span>
        </a>
    </li>
    @endcan
    @can('master-kategori')
    <li class="header light"><strong>MASTER Kategori</strong></li>
    <li class="no-b">
        <a href="{{ route('blank-page') }}">
            <i class="icon icon-archive red-text s-18"></i> 
            <span>Kategori</span>
        </a>
    </li>
    @endcan
    @can('master-user')
    <li class="header light"><strong>MASTER USER</strong></li>
    <li class="no-b">
        <a href="{{ route('master-user.user.index') }}">
            <i class="icon icon-user orange-text s-18"></i> 
            <span>User</span>
        </a>
    </li>
    @endcan
    @can('master-artikel')
    <li class="header light"><strong>MASTER ARTIKEL</strong></li>
    <li class="no-b">
        <a href="{{ route('master-artikel.artikel-terverifikasi.index') }}">
            <i class="icon icon-document-checked2 text-success s-18"></i> 
            <span>Terverifikasi</span>
        </a>
    </li>
    <li class="no-b">
        <a href="{{ route('master-artikel.artikel-belumTerverifikasi.index') }}">
            <i class="icon icon-document-cancel2 text-danger s-18"></i> 
            <span>Belum Terverifikasi</span>
        </a>
    </li>
    @endcan
    @can('master-gambar')
    <li class="header light"><strong>MASTER GAMBAR</strong></li>
    <li class="no-b">
        <a href="{{ route('master-gambar.gambar.index') }}">
            <i class="icon icon-file-picture-o blue-text s-18"></i> 
            <span>Gambar</span>
        </a>
    </li>
    @endcan
    @can('master-konsultasi')
    <li class="header light"><strong>MASTER KONSULTASI</strong></li>
    <li class="no-b">
        <a href="{{ route('master-konsultasi.pertanyaan.index') }}">
            <i class="icon icon-question text-success s-18"></i> 
            <span>Pertanyaan</span>
        </a>
        <a href="{{ route('master-konsultasi.konsultasi.index') }}">
            <i class="icon icon-document-text3 amber-text s-18"></i> 
            <span>Konsultasi</span>
        </a>
    </li>
    @endcan
</ul>
