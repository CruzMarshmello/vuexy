@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('authentication.register') }}@endsection
@section('keyword'){{ __('authentication.meta keyword') }}@endsection
@section('description'){{ __('authentication.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.authentications.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('authentication.register') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('authentication.full name') }} <span class="text-danger">*</span></label>
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
                                    " name="full_name" placeholder="{{ __('authentication.placeholder full name') }}" value="{{ old('full_name') }}" />
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
                                <label>{{ __('authentication.password') }} <span class="text-danger">*</span></label>
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
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input
                                @error ('agreed')
                                    is-invalid
                                @enderror"
                                id="agreed" name="agreed" value="agreed" {{ (old('agreed'))? 'checked' : '' }}/>
                                <label class="custom-control-label" for="agreed">
                                    {{ __('authentication.read agreed') }}
                                    <a href="#" data-toggle="modal" data-target="#modal">
                                        {{ $termsAndConditions->locale(session()->get('locale'))->title }}
                                    </a>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-block btn-primary">{{ __('authentication.create your account') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade modal-primary" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $termsAndConditions->locale(session()->get('locale'))->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $termsAndConditions->locale(session()->get('locale'))->description !!}
            </div>
        </div>
    </div>
</div>
@endsection
