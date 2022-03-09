@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('account.edit address') }}@endsection
@section('keyword'){{ __('account.meta keyword') }}@endsection
@section('description'){{ __('account.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.accounts.updateAddressBook',['id' => $addressBook->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('account.edit address') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('guest.panels.message')
                            <div class="form-group">
                                <label>{{ __('account.location') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('location')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="map-pin"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('location')
                                        is-invalid
                                    @enderror
                                    " name="location" placeholder="{{ __('account.placeholder location') }}" value="{{ old('location', $addressBook->location) }}" />
                                </div>
                                @error ('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.full name') }} <span class="text-danger">*</span></label>
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
                                    " name="full_name" placeholder="{{ __('account.placeholder full name') }}" value="{{ old('full_name', $addressBook->full_name) }}" />
                                </div>
                                @error ('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.address 1') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('address_1')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('address_1')
                                        is-invalid
                                    @enderror
                                    " name="address_1" placeholder="{{ __('account.placeholder address 1') }}" value="{{ old('address_1', $addressBook->address_1) }}" />
                                </div>
                                @error ('address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.address 2') }}</label>
                                <div class="input-group input-group-merge
                                @error ('address_2')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('address_2')
                                        is-invalid
                                    @enderror
                                    " name="address_2" placeholder="{{ __('account.placeholder address 2') }}" value="{{ old('address_2', $addressBook->address_2) }}" />
                                </div>
                                @error ('address_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.sub district') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('sub_district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('sub_district')
                                        is-invalid
                                    @enderror
                                    " name="sub_district" placeholder="{{ __('account.placeholder sub district') }}" value="{{ old('sub_district', $addressBook->sub_district) }}" />
                                </div>
                                @error ('sub_district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.district') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('district')
                                        is-invalid
                                    @enderror
                                    " name="district" placeholder="{{ __('account.placeholder district') }}" value="{{ old('district', $addressBook->district) }}" />
                                </div>
                                @error ('district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('account.province') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('province')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('province')
                                        is-invalid
                                    @enderror
                                    " name="province" placeholder="{{ __('account.placeholder province') }}" value="{{ old('province', $addressBook->province) }}" />
                                </div>
                                @error ('province')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('account.postal code') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('postal_code')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="number" class="form-control
                                    @error ('postal_code')
                                        is-invalid
                                    @enderror
                                    " name="postal_code" placeholder="11000" value="{{ old('postal_code', $addressBook->postal_code) }}" />
                                </div>
                                @error ('postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.country') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('country')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="flag"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('country')
                                        is-invalid
                                    @enderror
                                    " name="country" placeholder="{{ __('account.placeholder country') }}" value="{{ old('country', $addressBook->country) }}" />
                                </div>
                                @error ('country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.telephone') }} <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('telephone')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('telephone')
                                        is-invalid
                                    @enderror
                                    " name="telephone" placeholder="012-345-6789" value="{{ old('telephone', $addressBook->telephone) }}" />
                                </div>
                                @error ('telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-block btn-primary">{{ __('account.save changes') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
