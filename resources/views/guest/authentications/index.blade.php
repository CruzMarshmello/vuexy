@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('authentication.meta title') }}@endsection
@section('keyword'){{ __('authentication.meta keyword') }}@endsection
@section('description'){{ __('authentication.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.authentications.signIn') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('authentication.sign in') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('guest.panels.message')
                            <div class="form-group">
                                <label>{{ __('authentication.email') }} <span class="text-danger">*</span></label>
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
                                    " name="email" placeholder="john@example.com" value="{{ old('email') }}" />
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
                                <div class="d-flex justify-content-between">
                                    <label>{{ __('authentication.password') }} <span class="text-danger">*</span></label>
                                    <a href="{{ route('guest.authentications.forgotPassword') }}">
                                        <small>{{ __('authentication.forgot password') }}</small>
                                    </a>
                                </div>
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
                                @error ('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-block btn-primary">{{ __('authentication.sign in') }}</button>
                        </div>

                        <div class="col-md-12">
                            <div class="divider my-2">
                                <div class="divider-text">{{ __('authentication.or') }}</div>
                            </div>
                        </div>

                        <div class="col-12 mt-1">
                            <a class="btn btn-block btn-primary">
                                <i data-feather="facebook" class="mr-25"></i>
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class="col-12 mt-1">
                            <a class="btn btn-block btn-danger">
                                <span class="mr-25">G</span>
                                <span>Google</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-7 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('authentication.register') }}</h4>
            </div>
            <div class="card-body">
                {{ __('authentication.register description') }}
                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                        <a class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" href="{{ route('guest.authentications.create') }}">
                            {{ __('authentication.register') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
