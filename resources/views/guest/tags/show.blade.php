@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ $tag->locale(session()->get('locale'))->meta_title }}@endsection
@section('keyword'){{ $tag->locale(session()->get('locale'))->meta_keyword }}@endsection
@section('description'){{ $tag->locale(session()->get('locale'))->meta_description }}@endsection

@section('page-style')
<style media="screen">
    .blog:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 25px 0 rgba(34, 41, 47, 0.25);
    }
</style>
@endsection

@section('content')
<div class="row match-height"></div>
<div id="load-more"></div>
@endsection

@section('page-script')
<script>
    $(function() {
        const url = '{{ url("/") }}';
        let page = 1;
        loadMore(page);

        function loadMore(page) {
            $.ajax({
                    url: url + '/tags/load-more/{{ $tag->locale(session()->get("locale"))->slug }}?page=' + page,
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

            loadMore(page);
        });
    });
</script>
@endsection
