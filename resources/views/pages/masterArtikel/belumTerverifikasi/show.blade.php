@extends('layouts.app')
@section('title', '| Artikel Belum Terverifikasi')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-clipboard-list2"></i>
                        Show {{ $title }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li>
                        <a class="nav-link" href="{{ route($route.'index') }}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-document-bookmark2"></i>Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-document-edit"></i>Edit Artikel</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        @include('masterPages.alerts')
        <div id="alert"></div>
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-sm-3">
                        @include('pages.masterArtikel.terverifikasi.info_penulis')
                        @include('pages.masterArtikel.terverifikasi.info_editor')
                        <div class="card mt-2">
                            <div class="card-header white text-center">
                                <strong>AKSI UNTUK ARTIKEL</strong>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    @if ($artikel->status == 0)
                                    <form action="{{ route($route.'publish-artikel', $artikel->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button class="btn btn-primary mr-3">Publish</button>
                                        <button class="btn btn-secondary mr-4" type="button" onclick="history.back();">Back</button>
                                    </form>
                                    @else
                                    <button class="btn btn-danger mr-3" data-toggle="modal" data-target="#unpublish">Unpublish</button>
                                    <button class="btn btn-secondary mr-4" type="button" onclick="history.back();">Back</button>
                                    @endif
                                    <div class="modal fade" id="unpublish" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">
                                                        Yakin ingin menarik artikel ini ?
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                                                        <i class="icon icon-cancel"></i><span class="fs-14">Cancel</span>
                                                    </button>
                                                    <form action="{{ route($route.'unpublish-artikel', $artikel->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <button class="btn btn-danger" ><i class="icon icon-undo"></i>Unpublish</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header white text-center">
                                <strong>ARTIKEL</strong>
                            </div>
                            <div class="card-body">
                                <img class="img-fluid rounded mx-auto d-block mb-3" src="{{ config('app.ftp_src').'/images/artikel/'.$artikel->gambar }}" width="350" alt="photo">
                                <h5 class="mb-3 text-center">{{ $artikel->judul }}</h5>
                                <div>
                                    {!! $artikel->isi !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.masterArtikel.belumTerverifikasi.edit')
        </div>
    </div>
</div>
@endsection
