@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Whoops...</h4>
    <div class="alert-body">
        @foreach ($errors->all() as $key => $error)
        <p>
            <i data-feather='x-circle'></i>
            <span>{{ $error }}</span>
        </p>
        @endforeach
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
