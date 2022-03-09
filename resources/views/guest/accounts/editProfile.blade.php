@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('account.profile') }}@endsection
@section('keyword'){{ __('account.meta keyword') }}@endsection
@section('description'){{ __('account.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.accounts.updateProfile') }}" method="post">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('account.profile') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('guest.panels.message')
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
                                    " name="full_name" placeholder="{{ __('account.placeholder full name') }}" value="{{ old('full_name', Auth::user()->full_name) }}" />
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
                                <label>{{ __('account.email') }}</label>
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
                                    " name="email" placeholder="john@example.com" value="{{ old('email', Auth::user()->email) }}" disabled/>
                                </div>
                                @error ('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.password') }}</label>
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
                                    " name="password" placeholder="············" />
                                </div>
                                <p><small class="form-text">{{ __('account.regex') }}</small></p>
                                @error ('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.password confirmation') }}</label>
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
                                    " name="password_confirmation" placeholder="············" />
                                </div>
                                @error ('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('account.subscribe') }}</label>
                                <select class="form-control" name="subscribe">
                                    <option value="Disabled" {{ (old('subscribe', Auth::user()->subscribe->status) == 'Disabled')? 'selected' : '' }}>{{ __('account.disabled') }}</option>
                                    <option value="Enabled" {{ (old('subscribe', Auth::user()->subscribe->status) == 'Enabled')? 'selected' : '' }}>{{ __('account.enabled') }}</option>
                                </select>
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
