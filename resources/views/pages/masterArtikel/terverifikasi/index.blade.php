@extends('layouts.app')
@section('title', '| Artikel Terverifikasi')
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-clipboard-list2"></i>
                        Data {{ $title }}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="kategori_id" class="col-form-label s-12 col-md-3 text-right"><strong>Kategori :</strong></label>
                            <div class="col-sm-4">
                                <select name="kategori_id" id="kategori_id" class="select2 form-control r-0 light s-12">
                                    <option value="0">Semua</option>
                                    @foreach ($kategori as $i)
                                    <option value="{{ $i->id }}">{{ $i->n_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row" style="margin-top: -10px">
                            <label for="kategori_id" class="col-form-label s-12 col-md-3 text-right"><strong>Sub Kategori :</strong></label>
                            <div class="col-sm-4">
                                <select name="sub_kategori_id" id="sub_kategori_id" class="select2 form-control r-0 light s-12" onchange="selectOnChange()">
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Judul</th>
                                    <th width="100">Kategori</th>
                                    <th width="100">Tag</th>
                                    <th width="100">Artikel Dilihat</th>
                                    <th></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route($route.'api') }}",
            method: 'POST',
            data: function (data) {
                data.kategori_id = $('#kategori_id').val();
                data.sub_kategori_id = $('#sub_kategori_id').val();
            }
        },
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'judul', name: 'judul'},
            {data: 'kategori_id', name: 'kategori_id'},
            {data: 'tag', name: 'tag'},
            {data: 'artikel_view', name: 'artikel_view'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    // Sub Kategori
    $('#kategori_id').on('change', function(){
        val = $(this).val();
        option = "<option value='0'>&nbsp;</option>";
        if(val == ""){
            $('#sub_kategori_id').html(option);
        }else{
            $('#sub_kategori_id').html("<option value=''>Loading...</option>");
            url = "{{ route($route.'subKegiatanByKegiatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_sub_kategori +"</li>";
                    });
                    $('#sub_kategori_id').empty().html(option);

                    $("#sub_kategori_id").val($("#sub_kategori_id option:first").val()).trigger("change.select2");
                }else{
                    $('#sub_kategori_id').html(option);
                }
            }, 'JSON');
        }
    });

    function selectOnChange(){
        table.api().ajax.reload();
    }

    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route($route.'destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val());
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }

</script>
@endsection
