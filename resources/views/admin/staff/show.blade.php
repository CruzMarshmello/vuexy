@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Staff Show')

@section('content')
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-left align-items-center mb-1">
                    <div class="avatar-wrapper">
                        @if ($user->profile_picture)
                        <div class="avatar avatar-xl mr-50"><img class="rounded" src="{{ $user->profile_picture }}"></div>
                        @else
                        @php
                        $explode = explode(' ',$user->full_name);
                        if (count($explode) > 1) {
                        $profile_picture = Str::upper(Str::substr($explode[0],0,1).Str::substr($explode[1],0,1));
                        } else {
                        $profile_picture = Str::upper(Str::substr($explode[0],0,1));
                        }
                        @endphp
                        <div class="avatar avatar-xl bg-light-info rounded mr-50">
                            <div class="avatar-content">{{ $profile_picture }}</div>
                        </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="user-name text-truncate mb-0 ml-50">{{ $user->full_name }}</h5>
                        <small class="text-truncate text-muted ml-50">Administrator</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $user->full_name }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" disabled>
                                <option value="Active" {{ ($user->status == 'Active')? 'selected' : '' }}>Active</option>
                                <option value="Blocked" {{ ($user->status == 'Blocked')? 'selected' : '' }}>Blocked</option>
                                <option value="Deactivated" {{ ($user->status == 'Deactivated')? 'selected' : '' }}>Deactivated</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive border rounded mt-1">
                            <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                <span class="align-middle">Permission</span>
                            </h6>
                            <table class="table table-striped table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Module</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $a => $module)
                                    <tr>
                                        <td>{{ $module->name }}</td>
                                        @foreach ($module->permissions as $b => $permission)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $a }}-{{ $b }}" {{ ($user->hasPermission($permission->name))? 'checked' : '' }} disabled>
                                                <label class="custom-control-label" for="{{ $a }}-{{ $b }}"></label>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                        <a href="{{ route('admin.staff.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Staff
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
