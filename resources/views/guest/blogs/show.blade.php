@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ $blog->locale(session()->get('locale'))->meta_title }}@endsection
@section('keyword'){{ $blog->locale(session()->get('locale'))->meta_keyword }}@endsection
@section('description'){{ $blog->locale(session()->get('locale'))->meta_description }}@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ $blog->image }}" alt="{{ $blog->locale(session()->get('locale'))->title }}" />
            <div class="card-body">
                <h4 class="card-title">{{ $blog->locale(session()->get('locale'))->title }}</h4>
                <p class="card-text text-muted small">
                    {{ __('blog.last updated') }} {{ $blog->updated_at->diffForHumans() }}
                </p>
                <div class="d-flex flex-wrap">
                    <span class="mb-1 mr-1 align-self-center">
                        @foreach ($blog->tags as $key => $tag)
                        <a class="badge badge-pill badge-light-primary mr-50" href="{{ route('guest.tags.show',['slug' => $tag->locale(session()->get('locale'))->slug]) }}">
                            {{ $tag->locale(session()->get('locale'))->name }}
                        </a>
                        @endforeach
                    </span>
                    <ul class="unstyled-list list-inline pl-1 border-left">
                        @foreach ($shares as $key => $share)
                        @if ($key == 'facebook')
                        <li><a href="{{ $share }}" target="_blank" class="btn btn-icon rounded-circle bg-primary bg-darken-3 text-white"><i data-feather="facebook"></a></i></li>
                        @elseif ($key == 'twitter')
                        <li><a href="{{ $share }}" target="_blank" class="btn btn-icon rounded-circle bg-info bg-darken-1 text-white"><i data-feather="twitter"></a></i></li>
                        @elseif ($key == 'linkedin')
                        <li><a href="{{ $share }}" target="_blank" class="btn btn-icon rounded-circle bg-primary bg-darken-1 text-white"><i data-feather="linkedin"></a></i></li>
                        @else
                        <li><a href="{{ $share }}" target="_blank" class="btn btn-icon rounded-circle bg-success bg-darken-1 text-white"><i data-feather="phone"></a></i></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <p class="card-text">{!! $blog->locale(session()->get('locale'))->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
