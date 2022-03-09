@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Staff')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create staff'))
<a href="{{ route('admin.staff.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
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
                <form class="kb-search-input" action="{{ route('admin.staff.index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" class="form-control" name="search_full_name" placeholder="Search Full Name..." value="{{ old('search_full_name') }}" />
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th class="text-center">Verified</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        @if ($user->profile_picture)
                                        <div class="avatar mr-50"><img src="{{ $user->profile_picture }}" style="height:40px; width:40px;"></div>
                                        @else
                                        @php
                                        $explode = explode(' ',$user->full_name);
                                        if (count($explode) > 1) {
                                        $profile_picture = Str::upper(Str::substr($explode[0],0,1).Str::substr($explode[1],0,1));
                                        } else {
                                        $profile_picture = Str::upper(Str::substr($explode[0],0,1));
                                        }
                                        @endphp
                                        <div class="avatar avatar-sm bg-light-info mr-50">
                                            <div class="avatar-content" style="height:40px; width:40px;">{{ $profile_picture }}</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="user-name text-truncate mb-0 ml-50">{{ $user->full_name }}</h6>
                                        <small class="text-truncate text-muted ml-50">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($user->email_verified_at)
                                <i class="text-success" data-feather="user-check"></i>
                                @else
                                <i class="text-danger" data-feather="user-x"></i>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>
                                @if ($user->status === 'Active')
                                <div class="badge badge-light-success">{{ $user->status }}</div>
                                @elseif ($user->status == 'Blocked')
                                <div class="badge badge-light-danger">{{ $user->status }}</div>
                                @else
                                <div class="badge badge-light-warning">{{ $user->status }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read staff'))
                                        <a class="dropdown-item" href="{{ route('admin.staff.show', ['id' => $user->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update staff'))
                                        <a class="dropdown-item" href="{{ route('admin.staff.edit', ['id' => $user->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete staff'))
                                        <form action="{{ route('admin.staff.destroy', ['id' => $user->id]) }}" method="post">
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
                {{ $users->appends(['search_full_name' => old('search_full_name')])->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Hoverable rows end -->
@endsection
