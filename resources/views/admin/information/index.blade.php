@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Information')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create information'))
<a href="{{ route('admin.information.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
    <i data-feather="plus" class="mr-25"></i>
    <span>Create</span>
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
                <form class="kb-search-input" action="{{ route('admin.information.index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" class="form-control" name="search_title" placeholder="Search Title..." value="{{ old('search_title') }}" />
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $special = [1,2,3];
                        @endphp
                        @foreach ($information as $key => $info)
                        <tr>
                            <td>{{ $info->locale('en')->title }}</td>
                            <td>
                                @if ($info->status == 'Enabled')
                                <div class="badge badge-light-success">Enabled</div>
                                @else
                                <div class="badge badge-light-secondary">Disabled</div>
                                @endif
                            </td>
                            <td>{{ $info->created_at }}</td>
                            <td>{{ $info->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read information'))
                                        <a class="dropdown-item" href="{{ route('admin.information.show', ['id' => $info->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update information'))
                                        <a class="dropdown-item" href="{{ route('admin.information.edit', ['id' => $info->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete information') && !in_array($info->id, $special))
                                        <form action="{{ route('admin.information.destroy', ['id' => $info->id]) }}" method="post">
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
                {{ $information->appends(['search_title' => old('search_title')])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
