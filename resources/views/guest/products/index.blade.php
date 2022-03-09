@extends('guest.layouts.detachedLayoutMaster')

@section('title'){{ $search_name }}@endsection
@section('keyword')@endsection
@section('description')@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
@endsection


@section('content')
<section id="ecommerce-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="ecommerce-header-items">
                <div class="result-toggler">
                    <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                        <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="body-content-overlay"></div>

<section id="ecommerce-products" class="grid-view"></section>
<div id="load-more"></div>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/pages/app-ecommerce.js')) }}"></script>

<script>
    $(function() {
        const url = '{{ url("/") }}';
        let page = 1;

        loadMore(page);

        function loadMore(page) {
            $.ajax({
                    'url': url + '/search/load-more/{{ $search_name }}?page=' + page,
                    'type': 'get'
                })
                .done(function(response) {
                    $('#ecommerce-products').append(response.output);
                    $('#load-more').empty().append(response.loadMore);
                    feather.replace();
                });
        }

        $('#load-more').on('click', '.btn', function() {
            page = $(this).attr('data-page');

            loadMore(page);
        });
    });
</script>
@endsection
