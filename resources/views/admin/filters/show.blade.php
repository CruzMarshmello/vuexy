@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Filter Show')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Filter Group</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>English Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $filter->locale('en')->name }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Thai Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $filter->locale('th')->name }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sort Order</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                </div>
                                <input type="number" class="form-control" value="{{ $filter->sort_order }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header" style="margin-top:-30px;">
                <h4 class="card-title">Options</h4>
            </div>
            <div class="card-body" id="options">
                @foreach ($filter->children as $key => $option)
                <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>English Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $option->locale('en')->name }}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Thai Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $option->locale('th')->name }}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Sort Order</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                </div>
                                <input type="number" class="form-control" value="{{ $option->sort_order }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                @endforeach
            </div>

            <div class="card-body" style="margin-top:-50px;">
                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                        <a href="{{ route('admin.filters.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Filters
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
