@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('account.meta title') }}@endsection
@section('keyword'){{ __('account.meta keyword') }}@endsection
@section('description'){{ __('account.meta description') }}@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')
<div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">
    <div class="bs-stepper-header">
        <div class="step" data-target="#account-details-vertical-modern">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="user" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{ __('account.account') }}</span>
                    <span class="bs-stepper-subtitle">{{ __('account.account details') }}</span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#personal-info-vertical-modern">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{ __('account.order') }}</span>
                    <span class="bs-stepper-subtitle">{{ __('account.order details') }}</span>
                </span>
            </button>
        </div>
    </div>

    <div class="bs-stepper-content">
        <div id="account-details-vertical-modern" class="content">
            <div class="content-header">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-0" style="margin-top: 5px;">{{ __('account.profile') }}</h5>
                    <a href="{{ route('guest.accounts.editProfile') }}" class="btn btn-outline-primary btn-sm">
                        <small>{{ __('account.edit') }}</small>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('account.full name') }}</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i data-feather="user"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ Auth::user()->full_name}}" disabled />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('account.email') }}</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i data-feather="at-sign"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ Auth::user()->email}}" disabled />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('account.subscribe') }}</label>
                        <select class="form-control" disabled>
                            <option {{ (Auth::user()->subscribe->status == 'Disabled')? 'selected' : '' }}>{{ __('account.disabled') }}</option>
                            <option {{ (Auth::user()->subscribe->status == 'Enabled')? 'selected' : '' }}>{{ __('account.enabled') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>

            <div class="content-header">
                <div class="d-flex justify-content-between mb-1">
                    <h5 class="mb-0" style="margin-top: 5px;">{{ __('account.address book') }}</h5>
                    <a href="{{ route('guest.accounts.createAddressBook') }}" class="btn btn-outline-primary btn-sm">
                        <small>{{ __('account.create address') }}</small>
                    </a>
                </div>
                @include('guest.panels.message')
            </div>
            <div class="row match-height">
                @foreach (Auth::user()->addressBooks as $key => $addressBook)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-none bg-transparent border-secondary">
                        <div class="card-body">
                            <h4 class="card-title">{{ Str::limit($addressBook->location, 10) }}</h4>
                            <p class="card-text">{{ Str::limit($addressBook->address_1, 25) }}</p>
                            <form action="{{ route('guest.accounts.destroyAddressBook',['id' => $addressBook->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <a href="{{ route('guest.accounts.editAddressBook',['id' => $addressBook->id]) }}" class="card-link">{{ __('account.edit') }}</a>
                                <button type="submit" class="btn btn-link text-danger">
                                    <span>{{ __('account.delete') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="personal-info-vertical-modern" class="content">
            <div class="content-header">
                <h5 class="mb-0">{{ __('account.order') }}</h5>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('account.code') }}</th>
                                <th>{{ __('account.grand total') }}</th>
                                <th>{{ __('account.parcel') }}</th>
                                <th>{{ __('account.see detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->orders as $key => $order)
                            <tr>
                                <td>
                                    <a href="{{ route('guest.orders.show',['code' => $order->code, 'email' => Auth::user()->email]) }}">
                                        #{{ $order->code }}
                                    </a>
                                </td>
                                <td>
                                    @php
                                    $summary = unserialize($order->summary);
                                    @endphp
                                    {{ __('account.en bath') }}
                                    {{ number_format($summary['grandTotal']) }}
                                    {{ __('account.th bath') }}
                                </td>
                                <td>
                                    @if ($order->parcel == '')
                                    <span class="text-warning">{{ __('account.waiting') }}</span>
                                    @else
                                    {{ $order->parcel }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('guest.orders.show',['code' => $order->code, 'email' => Auth::user()->email]) }}" class="btn btn-icon rounded-circle btn-outline-primary">
                                        <i data-feather="eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection
