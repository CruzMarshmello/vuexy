@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('blog.meta title') }}@endsection
@section('keyword'){{ __('blog.meta keyword') }}@endsection
@section('description'){{ __('blog.meta description') }}@endsection

@section('page-style')
<style media="screen">
    .blog:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 25px 0 rgba(34, 41, 47, 0.25);
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="search"></i></span>
                </div>
                <input type="text" class="form-control" name="search_title" placeholder="{{ __('blog.search title') }}" />
            </div>
        </div>
    </div>
</div>

<div class="row match-height"></div>
<div id="load-more"></div>
@endsection

@section('page-script')
<script>
    $(function() {
        const url = '{{ url("/") }}';
        let page = 1;
        let search_title = '';
        loadMore(page, search_title);

        $('.input-group input[name=search_title]').on('keydown', function(e) {
            if (e.keyCode == 13) {
                page = 1;
                search_title = $(this).val();

                $('.match-height').empty();
                loadMore(page, $(this).val());
            }
        });

        function loadMore(page, search_title) {
            $.ajax({
                    url: url + '/blogs/load-more?page=' + page + '&search_title=' + search_title,
                    type: 'get',
                })
                .done(function(response) {
                    $('.match-height').append(response.output);
                    $('#load-more').empty().append(response.loadMore);
                    feather.replace();
                })
        }

        $('#load-more').on('click', '.btn', function() {
            page = $(this).attr('data-page');

            loadMore(page, search_title);
        });
    });
</script>
@endsection
