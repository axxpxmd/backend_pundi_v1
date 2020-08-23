<!-- Alert Success -->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif  
<!-- Alert Error -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Whoops Error!</strong>&nbsp;
    <span>You have {{ $errors->count() }} error</span>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach  
    </ul>
</div>
@endif