@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ $information->locale(session()->get('locale'))->meta_title }}@endsection
@section('keyword'){{ $information->locale(session()->get('locale'))->meta_keyword }}@endsection
@section('description'){{ $information->locale(session()->get('locale'))->meta_description }}@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $information->locale(session()->get('locale'))->title }}</h4>
                <p class="card-text">{!! $information->locale(session()->get('locale'))->description !!}</p>
                <p class="card-text">
                    <small class="text-muted">{{ __('information.last updated') }} {{ $information->updated_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
