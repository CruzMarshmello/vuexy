@extends('guest.layouts.detachedLayoutMaster')

@section('title'){{ $category->locale(session()->get('locale'))->meta_title }}@endsection
@section('keyword'){{ $category->locale(session()->get('locale'))->meta_keyword }}@endsection
@section('description'){{ $category->locale(session()->get('locale'))->meta_description }}@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
@endsection

@if ($category->children->count() != 0 || $category->filters->count() != 0)
@include('guest.categories.sidebar')
@endif

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
        let options = [];
        loadMore(page, options);

        function loadMore(page, options) {
            $.ajax({
                    'url': url + '/categories/load-more/{{ $category->locale(session()->get("locale"))->slug }}?page=' + page + '&options=' + options,
                    'type': 'get'
                })
                .done(function(response) {
                    $('#ecommerce-products').append(response.output);
                    $('#load-more').empty().append(response.loadMore);
                    feather.replace();
                });
        }

        $('.multi-range-price').on('change', 'input[type=checkbox]', function() {
            page = 1;
            options = [];
            $('input[type=checkbox]:checked').each(function() {
                options.push($(this).attr('data-id'));
            });

            $('#ecommerce-products').empty();
            loadMore(page, options);
        });

        $('#load-more').on('click', '.btn', function() {
            page = $(this).attr('data-page');

            loadMore(page, options);
        });
    });
</script>
@endsection
