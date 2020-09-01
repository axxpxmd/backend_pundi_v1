<div class="tab-pane fade" id="tambah-data" role="tabpanel">
    <form id="form" action="{{ route($route.'update-artikel', $artikel->id) }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
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
                            <button class="btn btn-success mr-3" >Simpan</button>
                            <button class="btn btn-secondary mr-4" type="button" onclick="history.back();">Back</button>
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
                        <div class="text-center">
                            <input type="file" name="gambar" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')">
                            <label for="file" class="btn-tertiary js-labelFile col-md-3 mx-auto d-block" style="margin-bottom: -10px">
                                <i class="icon icon-image"></i>
                                <span id="changeText" class="js-fileName">Ganti Gambar</span>
                            </label>
                            <br>
                            <img width="300" class="rounded img-fluid mx-auto d-block m-b-10" id="preview" alt=""/>
                        </div>
                        <input type="text" class="form-control mb-3 text-black" id="judul" name="judul" value="{{ $artikel->judul }}">
                        @include('masterPages.tinyMCE5')
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@section('script')
<script type="text/javascript">
    (function () {
        'use strict';
        $('.input-file').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                    .removeClass('has-file').html(labelVal);
            });
        });
    })();

    function tampilkanPreview(gambar, idpreview) {
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                $.confirm({
                    title: '',
                    content: 'Tipe file tidak boleh! haruf format gambar (png, jpg)',
                    icon: 'icon icon-close',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: "ok!",
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: reset()

                        }
                    }
                });
            }
        }
    }

    function reset(){
        $('#form').trigger('reset');
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
    }
</script>
@endsection