@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Tag Create')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="english-tab" data-toggle="pill" href="#english" aria-expanded="true"><i class="flag-icon flag-icon-us"></i> English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="thai-tab" data-toggle="pill" href="#thai" aria-expanded="false"><i class="flag-icon flag-icon-th"></i> Thai</a>
                </li>
            </ul>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- english tab -->
                        <div role="tabpanel" class="tab-pane active" id="english" aria-labelledby="english-tab" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('english_name')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="grid"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('english_name')
                                                is-invalid
                                            @enderror
                                            " name="english_name" placeholder="Men" value="{{ old('english_name') }}" />
                                        </div>
                                        @error ('english_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('english_slug')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="link"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('english_slug')
                                                is-invalid
                                            @enderror
                                            " name="english_slug" placeholder="fashion-for-men" value="{{ old('english_slug') }}" />
                                        </div>
                                        @error ('english_slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Title <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('english_meta_title')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="code"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('english_meta_title')
                                                is-invalid
                                            @enderror
                                            " name="english_meta_title" placeholder="Fashion for Men" value="{{ old('english_meta_title') }}" />
                                        </div>
                                        @error ('english_meta_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="code"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="english_meta_keyword" placeholder="men,fashion,sale" value="{{ old('english_meta_keyword') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" rows="8" name="english_meta_description" placeholder="Description">{{ old('english_meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- thai tab -->
                        <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('thai_name')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="grid"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('thai_name')
                                                is-invalid
                                            @enderror
                                            " name="thai_name" placeholder="ผู้ชาย" value="{{ old('thai_name') }}" />
                                        </div>
                                        @error ('thai_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('thai_slug')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="link"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('thai_slug')
                                                is-invalid
                                            @enderror
                                            " name="thai_slug" placeholder="แฟชั่น-สำหรับ-ผู้ชาย" value="{{ old('thai_slug') }}" />
                                        </div>
                                        @error ('thai_slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Title <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('thai_meta_title')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="code"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('thai_meta_title')
                                                is-invalid
                                            @enderror
                                            " name="thai_meta_title" placeholder="แฟชั่น สำหรับ ผู้ชาย" value="{{ old('thai_meta_title') }}" />
                                        </div>
                                        @error ('thai_meta_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="code"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="thai_meta_keyword" placeholder="ผู้ชาย,แฟชั่น,ลดราคา" value="{{ old('thai_meta_keyword') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" rows="8" name="thai_meta_description" placeholder="รายละเอียด">{{ old('thai_meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex flex-sm-row flex-column">
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
