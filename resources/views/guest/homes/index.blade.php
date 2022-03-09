@extends('guest.layouts.detachedLayoutMaster')

@section('title'){{ __('home.meta title') }}@endsection
@section('keyword'){{ __('home.meta keyword') }}@endsection
@section('description'){{ __('home.meta description') }}@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.css')) }}">

<style media="screen">
    .carousel .carousel-item {
        height: 600px;
    }

    .carousel-item img {
        position: absolute;
        object-fit: cover;
        top: 0;
        left: 0;
        min-height: 600px;
    }
</style>
@endsection

@section('content')
<div id="carousel-example-caption" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($slideshows as $key => $slideshow)
        <li data-target="#carousel-example-caption" data-slide-to="{{ $key }}" class="{{ ($key == 0)? 'active': '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($slideshows as $key => $slideshow)
        <div class="carousel-item {{ ($key == 0)? 'active': '' }}" data-interval="10000">
            <img class="img-fluid rounded" src="{{ asset($slideshow->image) }}" alt="{{ $slideshow->locale(session()->get('locale'))->title }}" width="100%" />
            <div class="carousel-caption" style="transform: translateY(-50%); bottom: initial; top: 50%;">
                <h1 class="text-white display-3 animated zoomInDown"><strong>{{ $slideshow->locale(session()->get('locale'))->title }}</strong></h1>
                <h5 class="text-white animated zoomInUp">
                    {!! $slideshow->locale(session()->get('locale'))->description !!}
                </h5>
                <a class="btn btn-primary round animated zoomInUp" href="{{ $slideshow->locale(session()->get('locale'))->url }}">{{ __('home.view more') }}</a>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section id="ecommerce-header" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="ecommerce-header-items">
                <div class="result-toggler align-self-end mt-1">
                    <h4>{{ __('home.latest product') }}</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ecommerce-products" class="grid-view"></section>
@endsection

@section('page-script')
<script>
    $(function() {
        const url = '{{ url("/") }}';
        const page = 1;
        loadMore(page);

        function loadMore(page) {
            $.ajax({
                'url': url + '/load-more?page=' + page,
                'type': 'get',
            }).
            done(function(response) {
                $('#ecommerce-products').append(response.output);
                feather.replace();
            });
        }
    });
</script>
@endsection
