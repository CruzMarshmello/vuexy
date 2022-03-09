@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Coupon Create')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.coupons.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('name')
                                        is-invalid
                                    @enderror
                                    " name="name" placeholder="New Year" value="{{ old('name') }}" />
                                </div>
                                @error ('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Code <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('code')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="pocket"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('code')
                                        is-invalid
                                    @enderror
                                    " name="code" placeholder="H2n1yR" value="{{ old('code') }}" />
                                </div>
                                @error ('code')
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

                <div class="card-header" style="margin-top:-30px;">
                    <h4 class="card-title">Coupon</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Range <span class="text-danger">*</span></label>
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
                                <label>Percentage <span class="text-danger">*</span></label>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('amount')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                    </div>
                                    <input type="number" class="form-control
                                    @error ('amount')
                                        is-invalid
                                    @enderror
                                    " name="amount" placeholder="0" value="{{ old('amount') }}" />
                                </div>
                                @error ('amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="margin-top:-50px;">
                    <div class="row">
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

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
