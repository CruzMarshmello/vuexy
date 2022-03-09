@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Emails')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create emails'))
<a href="{{ route('admin.emails.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
    <i data-feather="send" class="mr-25"></i>
    <span>Compose</span>
</a>
@endif
@endsection

@section('content')
@include('admin.panels.message')
<!-- Hoverable rows start -->
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="kb-search-input" action="{{ route('admin.emails.index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" class="form-control" name="search_subject" placeholder="Search Subject..." value="{{ old('search_subject') }}" />
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emails as $key => $email)
                        <tr>
                            <td>{{ Str::limit($email->subject, 200) }}</td>
                            <td>{{ $email->created_at }}</td>
                            <td>{{ $email->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read emails'))
                                        <a class="dropdown-item" href="{{ route('admin.emails.show', ['id' => $email->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete emails'))
                                        <form action="{{ route('admin.emails.destroy', ['id' => $email->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="dropdown-item" style="width:100%">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $emails->appends(['search_subject' => old('search_subject')])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
