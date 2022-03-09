@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('authentication.reset password') }}@endsection
@section('keyword'){{ __('authentication.meta keyword') }}@endsection
@section('description'){{ __('authentication.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.authentications.setPassword') }}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('authentication.reset password') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-info">{{ __('authentication.reset description') }}</p>
                        </div>
                        <div class="col-md-12">
                            @include('guest.panels.message')
                            <div class="form-group">
                                <label>{{ __('authentication.new password') }} <span class="text-danger">*</span></label>
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
                                <p><small class="form-text">{{ __('authentication.regex') }}</small></p>
                                @error ('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('authentication.password confirmation') }} <span class="text-danger">*</span></label>
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
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-block btn-primary">{{ __('authentication.set new password') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
