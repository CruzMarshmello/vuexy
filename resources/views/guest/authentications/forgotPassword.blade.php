@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('authentication.forgot password') }}@endsection
@section('keyword'){{ __('authentication.meta keyword') }}@endsection
@section('description'){{ __('authentication.meta description') }}@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-12">
        <form class="form form-vertical" action="{{ route('guest.authentications.sendLink') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('authentication.forgot password') }}</h4>
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
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-block btn-primary">{{ __('authentication.send reset link') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
