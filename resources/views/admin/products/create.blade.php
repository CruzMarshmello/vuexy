@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Product Create')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.products.store') }}" method="post">
            @csrf
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" aria-expanded="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="false">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="option-tab" data-toggle="pill" href="#option" aria-expanded="false">Option</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="link-tab" data-toggle="pill" href="#link" aria-expanded="false">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="discount-tab" data-toggle="pill" href="#discount" aria-expanded="false">Discount</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="image-tab" data-toggle="pill" href="#image" aria-expanded="false">Image</a>
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
                                                    " name="english_name" placeholder="Classic Superstate Polo" value="{{ old('english_name') }}" />
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
                                                    " name="english_slug" placeholder="classic-superstate-polo" value="{{ old('english_slug') }}" />
                                                </div>
                                                @error ('english_slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-50">
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <input type="hidden" name="english_description">
                                                    <div class="english-description">
                                                        {!! old('english_description') !!}
                                                    </div>
                                                </div>
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
                                                    " name="english_meta_title" placeholder="Classic Superstate" value="{{ old('english_meta_title') }}" />
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
                                                    <input type="text" class="form-control" name="english_meta_keyword" placeholder="classic,polo,men" value="{{ old('english_meta_keyword') }}" />
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
                                                    " name="thai_name" placeholder="เสื้อโปโล Classic Superstate" value="{{ old('thai_name') }}" />
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
                                                    " name="thai_slug" placeholder="เสื้อโปโล-classic-superstate" value="{{ old('thai_slug') }}" />
                                                </div>
                                                @error ('thai_slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-50">
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <input type="hidden" name="thai_description">
                                                    <div class="thai-description">
                                                        {!! old('thai_description') !!}
                                                    </div>
                                                </div>
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
                                                    " name="thai_meta_title" placeholder="เสื้อโปโล Classic Superstate" value="{{ old('thai_meta_title') }}" />
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
                                                    <input type="text" class="form-control" name="thai_meta_keyword" placeholder="เสื้อโปโล,classic,ผู้ชาย" value="{{ old('thai_meta_keyword') }}" />
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="pocket"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="sku" placeholder="000SKU123" value="{{ old('sku') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <div class="input-group input-group-merge
                                        @error ('quantity')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                            </div>
                                            <input type="number" class="form-control
                                            @error ('quantity')
                                                is-invalid
                                            @enderror
                                            " name="quantity" placeholder="0" value="{{ old('quantity') }}" />
                                        </div>
                                        @error ('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <div class="input-group input-group-merge
                                        @error ('price')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                                            </div>
                                            <input type="number" class="form-control
                                            @error ('price')
                                                is-invalid
                                            @enderror
                                            " name="price" placeholder="0" value="{{ old('price') }}" />
                                        </div>
                                        @error ('price')
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
                                            <option value="Enabled" {{ (old('status') == 'Enabled')? 'selected' : '' }}>Enabled</option>
                                            <option value="Disabled" {{ (old('status') == 'Disabled')? 'selected' : '' }}>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- option tab -->
                        <div class="tab-pane" id="option" role="tabpanel" aria-labelledby="option-tab" aria-expanded="false">
                            <div class="clearfix">
                                <button class="btn btn-outline-info text-nowrap float-right" type="button" id="btn-option-plus">
                                    <i data-feather="plus"></i>
                                </button>
                            </div>

                            @if (old('options'))
                            @foreach (old('options') as $key => $option)
                            <div id="option-{{ $key }}">
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-3 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="pocket"></i></span></span>
                                                </div>
                                                <input type="text" class="form-control" name="options[{{ $key }}][sku]" placeholder="000SKU123" value="{{ old('options')[$key]['sku'] }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>English Name <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                                    @error('options.'.$key.'.english_name')
                                                        is-invalid
                                                    @enderror
                                                    ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                        @error ('options.'.$key.'.english_name')
                                                            is-invalid
                                                        @enderror
                                                        " name="options[{{ $key }}][english_name]" placeholder="M" value="{{ old('options')[$key]['english_name'] }}" />
                                            </div>
                                            @error ('options.'.$key.'.english_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Thai Name <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                                    @error('options.'.$key.'.thai_name')
                                                        is-invalid
                                                    @enderror
                                                    ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                        @error('options.'.$key.'.thai_name')
                                                            is-invalid
                                                        @enderror
                                                        " name="options[{{ $key }}][thai_name]" placeholder="เล็ก" value="{{ old('options')[$key]['thai_name'] }}" />
                                            </div>
                                            @error ('options.'.$key.'.thai_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Quantity <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                                    @error('options.'.$key.'.quantity')
                                                        is-invalid
                                                    @enderror
                                                    ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                                </div>
                                                <input type="number" class="form-control
                                                        @error('options.'.$key.'.quantity')
                                                            is-invalid
                                                        @enderror
                                                        " name="options[{{ $key }}][quantity]" placeholder="0" value="{{ old('options')[$key]['quantity'] }}" />
                                            </div>
                                            @error ('options.'.$key.'.quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Price <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                                    @error('options.'.$key.'.price')
                                                        is-invalid
                                                    @enderror
                                                    ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                                </div>
                                                <input type="number" class="form-control
                                                        @error('options.'.$key.'.price')
                                                            is-invalid
                                                        @enderror
                                                        " name="options[{{ $key }}][price]" placeholder="0" value="{{ old('options')[$key]['price'] }}" />
                                            </div>
                                            @error ('options.'.$key.'.price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12 align-self-center">
                                        <div class="form-group">
                                            <button class="btn btn-outline-danger text-nowrap" type="button" id="btn-option-delete" data-id="{{ $key }}">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <!-- link tab -->
                        <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <label>Categories</label>
                                    <select class="select2 form-control" name="categories[]" multiple>
                                        @foreach ($categories as $key => $category)
                                        <optgroup label="Category">
                                            <option value="{{ $category->id }}" @if (old('categories'))
                                            {{ in_array($category->id, old('categories'))? 'selected' : '' }}
                                            @endif
                                            >
                                            {{ $category->locale('en')->name }}
                                            </option>
                                            @if ($category->children->count() > 0)
                                            @include('admin.products.recursiveCreate', ['parent' => $category->locale('en')->name, 'children' => $category->children])
                                            @endif
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label>Filters</label>
                                    <select class="select2 form-control" name="filters[]" multiple>
                                        @foreach ($filters as $key => $filter)
                                        <optgroup label="{{ $filter->locale('en')->name }}">
                                            @foreach ($filter->children as $key => $option)
                                            <option value="{{ $option->id }}" @if (old('filters'))
                                            {{ in_array($option->id, old('filters')) ? 'selected' : '' }}
                                            @endif
                                            >
                                            {{ $option->locale('en')->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- discount tab -->
                        <div class="tab-pane" id="discount" role="tabpanel" aria-labelledby="discount-tab" aria-expanded="false">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Range</label>
                                        <div class="input-group input-group-merge
                                        @error ('daterange')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control flatpickr-range
                                            @error ('daterange')
                                                is-invalid
                                            @enderror
                                            " name="daterange" placeholder="YYYY-MM-DD to YYYY-MM-DD" value="{{ old('daterange') }}" />
                                        </div>
                                        @error ('daterange')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Percentage</label>
                                        <div class="input-group input-group-merge
                                        @error ('percentage')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="percent"></i></span>
                                            </div>
                                            <input type="number" class="form-control
                                            @error ('percentage')
                                                is-invalid
                                            @enderror
                                            " name="percentage" placeholder="0" value="{{ old('percentage') }}" />
                                        </div>
                                        @error ('percentage')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- image tab -->
                        <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab" aria-expanded="false">
                            <div class="dropzone dropzone-area mb-2" id="dropzone">
                                <div class="dz-message">
                                    Drop files here or click to upload 1:1
                                </div>
                            </div>
                            <div class="row">
                                @if (old('paths'))
                                @foreach (old('images') as $key => $image)
                                <div class="col-md-3 mb-1" id="image-{{ $image }}">
                                    <img class="rounded img-fluid" src="{{ old('paths')[$key] }}">
                                    <input type="hidden" name="images[]" value="{{ $image }}">
                                    <input type="hidden" name="paths[]" value="{{ old('paths')[$key] }}">
                                    <button type="button" class="btn btn-block btn-flat-danger" id="btn-image-delete" data-id="{{ $image }}">Delete</button>
                                </div>
                                @endforeach
                                @endif
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
<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- <script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script> --}}
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>

<script type="text/javascript">
    $(function() {
        // Editor
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'direction': 'rtl'
            }],

            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];

        var english = new Quill('.english-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Compose a description...',
            theme: 'snow'
        });

        var thai = new Quill('.thai-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'เขียนคำอธิบาย...',
            theme: 'snow'
        });


        var form = document.querySelector('form');
        form.onsubmit = function() {
            var englishDescription = $('input[name=english_description]');
            var thaiDescription = $('input[name=thai_description]');

            englishDescription.val(english.root.innerHTML);
            thaiDescription.val(thai.root.innerHTML);
        };

        // Option
        $('#option').on('click', '#btn-option-plus', function() {
            const i = parseInt($('button[id = btn-option-delete]').last().attr('data-id')) + 1 | 0;

            let div = '<div id="option-' + i + '">';
            div += '<div class="row d-flex align-items-end">';
            div += '<div class="col-md-3 col-12">';
            div += '<div class="form-group">';
            div += '<label>SKU</label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="pocket"></i></span></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="options[' + i + '][sku]" placeholder="000SKU123" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-2 col-12">';
            div += '<div class="form-group">';
            div += '<label>English Name <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="options[' + i + '][english_name]" placeholder="M" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-2 col-12">';
            div += '<div class="form-group">';
            div += '<label>Thai Name <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="options[' + i + '][thai_name]" placeholder="เล็ก" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-2 col-12">';
            div += '<div class="form-group">';
            div += '<label>Quantity <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="shuffle"></i></span>';
            div += '</div>';
            div += '<input type="number" class="form-control" name="options[' + i + '][quantity]" placeholder="0" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-2 col-12">';
            div += '<div class="form-group">';
            div += '<label>Price <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="shuffle"></i></span>';
            div += '</div>';
            div += '<input type="number" class="form-control" name="options[' + i + '][price]" placeholder="0" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-1 col-12">';
            div += '<div class="form-group">';
            div += '<button class="btn btn-outline-danger text-nowrap" type="button" id="btn-option-delete" data-id="' + i + '">';
            div += '<i data-feather="x"></i>';
            div += '</button>';
            div += '</div>';
            div += '</div>';
            div += '</div>';
            div += '<hr />';
            div += '</div>';

            $('#option').append(div);
            $('#option-' + i).hide().slideDown();
            feather.replace()
        });

        $('#option').on('click', '#btn-option-delete', function() {
            const i = $(this).attr('data-id');

            $('#option-' + i).slideUp('medium', function() {
                $(this).remove();
            });
        });

        $('#image').on('click', '#btn-image-delete', function() {
            const i = $(this).attr('data-id');

            $('#image-' + i).fadeOut('medium', function() {
                $(this).remove();
            });
        });
    });

    Dropzone.autoDiscover = false;
    let dropzone = new Dropzone('#dropzone', {
        url: '/admin/products/dropzone',
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        acceptedFiles: '.jpg',
        maxFilesize: 256,
        previewsContainer: false,
        uploadMultiple: true,
    });

    dropzone.on('successmultiple', function(file, response) {
        response.ids.forEach((id, i) => {
            let div = '<div class="col-md-3 mb-1" id="image-' + id + '">';
            div += '<img class="rounded img-fluid" src="' + response.paths[i] + '">';
            div += '<input type="hidden" name="images[]" value="' + id + '">';
            div += '<input type="hidden" name="paths[]" value="' + response.paths[i] + '">';
            div += '<button type="button" class="btn btn-block btn-flat-danger" id="btn-image-delete" data-id="' + id + '">Delete</button>';
            div += '</div>';

            $('#image .row').append(div);
            $('#image-' + id).hide().fadeIn();
        });
    });
</script>
@endsection
