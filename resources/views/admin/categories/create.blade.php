@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Category Create')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" aria-expanded="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="false">Data</a>
                </li>
            </ul>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane active" id="general" aria-labelledby="general-tab" aria-expanded="true">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" id="english-tab" data-toggle="pill" href="#english" aria-expanded="true"><i class="flag-icon flag-icon-us"></i> English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="thai-tab" data-toggle="pill" href="#thai" aria-expanded="false"><i class="flag-icon flag-icon-th"></i> Thai</a>
                                </li>
                            </ul>

                            <div class="tab-content">
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
                        </div>

                        <!-- data tab -->
                        <div class="tab-pane" id="data" role="tabpanel" aria-labelledby="data-tab" aria-expanded="false">
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <label>Category</label>
                                    <select class="select2 form-control" name="category">
                                        <optgroup label="Category">
                                            <option value="0" {{ (old('category') == '0')? 'selected' : '' }}>Main</option>
                                        </optgroup>
                                        @foreach ($categories as $key => $category)
                                        <optgroup label="Category">
                                            <option value="{{ $category->id }}" {{ (old('category') == $category->id)? 'selected' : '' }}>
                                                {{ $category->locale('en')->name }}
                                            </option>
                                            @if ($category->children->count() > 0)
                                            @include('admin.categories.recursiveCreate', ['parent' => $category->locale('en')->name, 'children' => $category->children])
                                            @endif
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8 mb-1">
                                    <label>Filter Groups</label>
                                    <select class="select2 form-control" name="filters[]" multiple>
                                        @foreach ($filters as $key => $filter)
                                        <option value="{{ $filter->id }}" @if (old('filters'))
                                        {{ in_array($filter->id, old('filters'))? 'selected' : '' }}
                                        @endif
                                        >
                                        {{ $filter->locale('en')->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sort Order <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('sort_order')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                            </div>
                                            <input type="number" class="form-control
                                            @error ('sort_order')
                                                is-invalid
                                            @enderror
                                            " name="sort_order" placeholder="0" value="{{ old('sort_order') }}" />
                                        </div>
                                        @error ('sort_order')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
