@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Category Show')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-12">
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
                                            <label>Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('en')->name }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="link"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('en')->slug }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="code"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('en')->meta_title }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="code"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('en')->meta_keyword }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $category->locale('en')->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('th')->name }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="link"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('th')->slug }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="code"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('th')->meta_title }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="code"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $category->locale('th')->meta_keyword }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $category->locale('th')->meta_description }}</textarea>
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
                                <select class="select2 form-control" disabled>
                                    <optgroup label="Category">
                                        <option {{ ($category->parent_id == '0')? 'selected' : '' }}>Main</option>
                                    </optgroup>
                                    @foreach ($categories as $key => $array)
                                    <optgroup label="Category">
                                        <option {{ ($category->parent_id == $array->id)? 'selected' : '' }}>
                                            {{ $array->locale('en')->name }}
                                        </option>
                                        @if ($array->children->count() > 0)
                                        @include('admin.categories.recursiveEdit', ['parent' => $array->locale('en')->name, 'children' => $array->children])
                                        @endif
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 mb-1">
                                <label>Filter Groups</label>
                                <select class="select2 form-control" multiple disabled>
                                    @foreach ($filters as $key => $filter)
                                    <option {{ ($category->hasFilter($filter->id))? 'selected' : '' }}>
                                        {{ $filter->locale('en')->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $category->sort_order }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.categories.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
