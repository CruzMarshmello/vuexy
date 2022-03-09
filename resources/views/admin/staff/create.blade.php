@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Staff Create')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label>Profile Picture</label>
                                    <small>1:1</small>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/jpg" name="profile_picture" />
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('full_name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('full_name')
                                        is-invalid
                                    @enderror
                                    " name="full_name" placeholder="John Doe" value="{{ old('full_name') }}" />
                                </div>
                                @error ('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('email')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('email')
                                        is-invalid
                                    @enderror
                                    " name="email" placeholder="john@example.com" value="{{ old('email') }}" />
                                </div>
                                @error ('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('password')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control
                                    @error ('password')
                                        is-invalid
                                    @enderror
                                    " name="password" placeholder="John5266325@" />
                                </div>
                                @error ('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password Confirmation <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('password_confirmation')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control
                                    @error ('password_confirmation')
                                        is-invalid
                                    @enderror
                                    " name="password_confirmation" placeholder="John5266325@" />
                                </div>
                                @error ('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Active" {{ (old('status') == 'Active')? 'selected' : '' }}>Active</option>
                                    <option value="Blocked" {{ (old('status') == 'Blocked')? 'selected' : '' }}>Blocked</option>
                                    <option value="Deactivated" {{ (old('status') == 'Deactivated')? 'selected' : '' }}>Deactivated</option>
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
                                                    <input type="checkbox" class="custom-control-input" id="{{ $a }}-{{ $b }}" name="permissions[]" value="{{ $permission->name }}"
                                                        {{ (is_array(old('permissions')) && in_array($permission->name, old('permissions')))? 'checked' : '' }} />
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
                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
