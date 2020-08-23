<div class="card">
    <div class="card-header white text-center">
        <strong>PENULIS</strong>
    </div>
    <div class="card-body">
        <div class="text-center">
            @if ($artikel->penulis->photo != null)
            <img class="img-fluid rounded-circle mx-auto d-block mb-2" src="{{ config('app.ftp_src').'ava/'.$artikel->penulis->photo }}" width="80" alt="">
            @else
            <img class="img-fluid rounded-circle mx-auto d-block mb-2" src="{{ config('app.path_url').'boy.png'}}" width="80" alt="">
            @endif
            <p><strong>{{ $artikel->penulis->bio }}</strong></p>
        </div>
        <div class="ml-3">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $artikel->penulis->name }}</label>
                </div>
            </div>
            <div class="form-group row -mt-20">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $artikel->penulis->email }}</label>
                </div>
            </div>
            <div class="form-group row -mt-20">
                <label class="col-sm-3 col-form-label">Kontak</label>
                <div class="col-sm-9">
                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $artikel->penulis->nomor_hp }}</label>
                </div>
            </div>
        </div>
    </div>
</div>