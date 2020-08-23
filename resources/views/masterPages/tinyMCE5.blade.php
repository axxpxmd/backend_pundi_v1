<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tiny MCE 5</title>

    <!-- JS CDN -->
    <script src="https://cdn.tiny.cloud/1/kmpjl2vq2hx8zh493a02m8sxahks3nt4inhuoqxbxn3i17bj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
    <textarea name="isi">{!! $artikel->isi !!}</textarea>
</body>
<script type="text/javascript">
    tinymce.init({
        height: 580,
        selector: 'textarea',
        plugins: [
            'advlist autolink link image lists charmap preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview | forecolor backcolor emoticons |  | fullscreen',

        menubar: 'file edit view insert format tools table',
        content_css: 'css/content.css'
    });
</script>
</html>

