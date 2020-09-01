// tinyMCE5
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