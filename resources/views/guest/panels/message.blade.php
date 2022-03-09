@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="alert-body">
        <i data-feather='check-circle'></i>
        <span>{{ Session::get('success') }}</span>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <div class="alert-body">
        <i data-feather='alert-triangle'></i>
        <span>{{ Session::get('warning') }}</span>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="alert-body">
        <i data-feather='x-circle'></i>
        <span>{{ Session::get('error') }}</span>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
