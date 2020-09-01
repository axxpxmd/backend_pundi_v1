@extends('layouts.app')
@section('title', '| Data Konsultasi')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-document-text3"></i>
                        Show {{ $title }} | {{ $konsultasi->nama }}
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
                        <strong>Konsultasi dari</strong>
                    </div>
                    <div class="card-body">
                        <div class="ml-3">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $konsultasi->nama }}</label>
                                </div>
                            </div>
                            <div class="form-group row -mt-20">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $konsultasi->email }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header white text-center">
                        <strong>Dibaca Oleh</strong>
                    </div>
                    <div class="card-body">
                        <div class="ml-3">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $confirm_by->nama }}</label>
                                </div>
                            </div>
                            <div class="form-group row -mt-20">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $confirm_by->email }}</label>
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
                            <label class="col-sm-3 col-form-label">Konsultasi &nbsp;:</label>
                            <div class="col-sm-9">
                                <label class="col-form-label" style="margin-left: -24%">{{ $konsultasi->konsultasi }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection