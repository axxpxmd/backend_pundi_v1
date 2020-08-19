@extends('layouts.app')
@section('title', '| Data User')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-settings2"></i>
                        Show {{ $title }} | {{ $userPundi->name }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pegawai-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ route($route.'index') }}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="card">
            <h6 class="card-header"><strong>Data User</strong></h6>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Nama :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->name }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Username :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->username }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Email :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->email }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Nama Depan :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->nama_depan }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Nama Belakang :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->nama_belakang }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Nomor HP :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->nomor_hp }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Bio :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->bio }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Facebook :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->facebook }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Twitter :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->twitter }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Instagram :</strong></label>
                        <label class="col-md-3 s-12">{{ $userPundi->instagram }}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right s-12"><strong>Logo  :</strong></label>
                        <img class="ml-2 m-t-7 rounded-circle" src="{{ config('app.ftp_src').'/ava/'.$userPundi->photo }}" width="100" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection