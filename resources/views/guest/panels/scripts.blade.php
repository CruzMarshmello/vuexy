<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
@if ($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
@yield('page-script')

<script>
    $(function() {
        $('#main-menu-navigation').on('click', '#nav-text', function() {
            const url = '{{ url("/") }}';
            const slug = $(this).attr('data-slug');

            window.location.href = url + '/categories/' + slug;
        });


        $('.nav-search input[name=search_name]').on('keydown', function(e) {
            if (e.keyCode == 13) {
                const url = '{{ url("/") }}';
                const search_name = $(this).val();

                window.location.href = url + '/search/' + search_name;
            }
        });


        $('#subscribe').on('click', '#btn-subscribe', function() {
            const url = '{{ url("/") }}';
            const email = $('#email').val();

            $.ajax({
                url: url + '/subscribes',
                type: 'post',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'email': email
                }
            }).done(function(response) {
                $('#email').val('');
                $('#email').removeClass('is-invalid');
                $('#btn-subscribe').removeClass('btn-outline-danger').addClass('btn-outline-primary');
                $('#subscribe-message').removeClass('text-danger').addClass('text-success');
                $('#subscribe-message').empty().append(response.message)
            }).fail(function(error) {
                if (error.status == 400) {
                    $('#email').addClass('is-invalid');
                    $('#btn-subscribe').removeClass('btn-outline-primary').addClass('btn-outline-danger');
                    $('#subscribe-message').removeClass('text-success').addClass('text-danger');
                    $('#subscribe-message').empty().append(error.responseJSON.errors[0]);
                }
            });
        });
    })
</script>
