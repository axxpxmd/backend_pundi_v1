<div class="card mt-2">
    <div class="card-header white text-center">
        <strong>EDITOR</strong>
    </div>
    <div class="card-body">
        <div class="ml-3">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $editor == null ? '-' : $editor->nama }}</label>
                </div>
            </div>
            <div class="form-group row -mt-20">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <label class="form-control-plaintext -ml-30">:&nbsp; {{ $editor == null ? '-' : $editor->email }}</label>
                </div>
            </div>
        </div>
    </div>
</div>