@extends('layouts.app')
@section('title', '| Data Konsultasi')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-comments "></i>
                        Show {{ $title }} | {{ $komen->nama }}
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
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header white text-center">
                        <strong>Komentar dari</strong>
                    </div>
                    <div class="card-body">
                        <div class="ml-3">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    @if ($komen->user_id != null)
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $user->name }}</label>
                                    @else   
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $komen->nama }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row -mt-20">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    @if ($komen->user_id != null)
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $user->email }}</label>
                                    @else   
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $komen->email }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header white text-center">
                        <strong>Artikel</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Komentar &nbsp;:</label>
                            <div class="col-sm-9">
                                <label class="col-form-label" style="margin-left: -24%">{{ $komen->comment }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection