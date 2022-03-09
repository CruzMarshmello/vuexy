@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Coupon Show')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $coupon->name }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Code</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="pocket"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $coupon->code }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" disabled>
                                    <option {{ ($coupon->status == 'Enabled')? 'selected' : '' }}>Enabled</option>
                                    <option {{ ($coupon->status == 'Disabled')? 'selected' : '' }}>Disabled</option>
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
                                <label>Date Range</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $coupon->start_date.' to '.$coupon->end_date }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Percentage</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="percent"></i></span>
                                    </div>
                                    <input type="number" class="form-control" value="{{ $coupon->percentage }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                    </div>
                                    <input type="number" class="form-control" value="{{ $coupon->amount }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="margin-top:-50px;">
                    <div class="row">
                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <a href="{{ route('admin.coupons.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                                <i data-feather="chevron-left"></i> Back to Coupons
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
