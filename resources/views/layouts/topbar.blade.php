<div class="has-sidebar-left">
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                <div class="search-bar">
                    <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text" placeholder="start typing...">
                </div>
                <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
            </div>
        </div>
    </div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <div class="d-flex">
                    <div>
                        <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
                    @if(Auth::user()->user)
                    <div class="d-none d-md-block">
                        <h1 class="nav-title text-white">Login Sebagai {{ Auth::user()->user->username }}</h1>
                    </div>
                    @endif
                </div>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown custom-dropdown user user-menu ">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            @if(Auth::user()->user)
                            <img src="{{ Auth::user()->user->foto == '' ? asset('assets/img/dummy/u1.png') : env('SFTP_SRC').'foto/'.Auth::user()->user->foto }}" class="user-image fotoLink" alt="User Image">
                            @else
                            <img src="{{ asset('assets/img/dummy/u4.png')}}" class="user-image fotoLink" alt="User Image">
                            @endif
                            <i class="icon-more_vert "></i>
                        </a>
                        <div class="dropdown-menu p-4 dropdown-menu-right" style="width:255px">
                            <div class="row box justify-content-between">
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-user amber-text lighten-2 avatar r-5"></i>
                                        <div class="pt-1">Profil</div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-user-secret pink-text lighten-1 avatar  r-5"></i>
                                        <div class="pt-1">Ganti Password</div>
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