@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ $product->locale(session()->get('locale'))->meta_title }}@endsection
@section('keyword'){{ $product->locale(session()->get('locale'))->meta_keyword }}@endsection
@section('description'){{ $product->locale(session()->get('locale'))->meta_description }}@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce-details.css')) }}">
<link rel="stylesheet" href="{{ asset('css/base/plugins/lightslider/lightslider.css') }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<section class="app-ecommerce-details">
    <div class="card">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                    <ul id="imageGallery">
                        @foreach ($product->productImages as $key => $productImage)
                        <li data-thumb="{{ $productImage->path }}" data-src="{{ $productImage->path }}" alt="product image">
                            <img src="{{ $productImage->path }}" class="img-fluid product-img" />
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-md-7">
                    <h4>{{ $product->locale(session()->get('locale'))->name }}</h4>

                    @php
                    $now = Carbon\Carbon::now()->format('Y-m-d');
                    @endphp

                    @if ($product->start_date <= $now && $product->end_date >= $now)
                        <span class="card-text item-company">
                            <div class="badge badge-danger">{{ __('product.sale') }}</div>
                            @php
                            $percentage = $product->percentage;
                            @endphp
                            <input type="hidden" id="percentage" value="{{ $product->percentage }}">
                        </span>
                        @else
                        <input type="hidden" id="percentage" value="0">
                        @endif

                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price mr-1 align-self-center">
                                <span class="h5 text-muted" id="sale"></span>
                                <span class="h3 text-primary" id="total"></span>
                            </h4>
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

                        <p class="card-text" id="available">{{ __('product.available') }} - </p>
                        <p class="card-text">
                            {!! $product->locale(session()->get('locale'))->description !!}
                        </p>

                        @if ($product->children->count() > 0)
                        @foreach ($product->children as $key => $option)
                        @if ($option->quantity > 0)
                        @php
                        $check = $key;
                        break;
                        @endphp
                        @else
                        @php
                        $check = 99999;
                        @endphp
                        @endif
                        @endforeach
                        <hr />
                        <div class="product-color-options">
                            <h6>{{ __('product.options') }}</h6>
                            <div class="demo-inline-spacing" style="margin-top:-20px">
                                @foreach ($product->children as $key => $option)
                                <div class="custom-control custom-control-primary custom-radio">
                                    <input type="radio" id="{{ $key }}" name="product" class="custom-control-input" data-id="{{ $option->id }}" data-price="{{ $option->price }}" data-quantity="{{ $option->quantity }}"
                                        {{ ($option->quantity == 0)? 'disabled' : '' }} {{ ($key == $check)? 'checked' : '' }} />
                                    <label class="custom-control-label" for="{{ $key }}">{{ $option->locale(session()->get('locale'))->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="product" data-id="{{ $product->id }}" data-price="{{ $product->price }}" data-quantity="{{ $product->quantity }}">
                        @endif
                        <hr />
                        <div class="row">
                            <div class="input-group input-group-lg" id="touchspin">
                                <input type="number" class="touchspin" value="1" />
                            </div>
                        </div>

                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <button type="button" class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0" id="btn-cart">
                                <i data-feather="shopping-cart" class="mr-50"></i>
                                <span class="add-cart">{{ __('product.cart') }}</span>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/pages/app-ecommerce-details.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
<script src="{{ asset('js/scripts/lightslider/lightslider.js') }}"></script>

<script type="text/javascript">
    $(function() {
        // lightSlider
        $('#imageGallery').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            slideMargin: 0,
            enableDrag: true,
            currentPagerPosition: 'left',
        });

        // product
        const percentage = $('#percentage').val();
        let quantity = 0;
        let price = 0;

        $('input[name=product]').each(function() {
            quantity += parseInt($(this).attr('data-quantity'));
        });

        // quantity
        if (quantity != 0) {
            $('#available').append('<span class="text-success">{{ __("product.is") }}</span>');
        } else {
            $('#available').append('<span class="text-danger">{{ __("product.oos") }}</span>');
            $('#touchspin').addClass('disabled-touchspin');
            $('.touchspin').attr('disabled', true);
            $('#btn-cart').attr('disabled', true);
        }

        show();

        $('.custom-radio').on('click', 'input[type=radio]', function() {
            show();
        });

        $('.app-ecommerce-details').on('click', '#btn-cart', function() {
            cart();
        });

        function show() {
            const type = $('input[name=product]').attr('type');

            if (type == 'radio') {
                if ($('input[name=product]:checked').attr('data-price')) {
                    price = parseInt($('input[name=product]:checked').attr('data-price'));
                } else {
                    price = parseInt($('input[name=product]:first').attr('data-price'));
                }
            } else {
                price = parseInt($('input[name=product]').attr('data-price'));
            }

            if (percentage != 0) {
                const discount = price * percentage / 100;
                const total = price - discount;

                $('#sale').empty().append('<del class="text-mute">{{ __("product.en bath") }} ' + price.toLocaleString('th-TH') + ' {{ __("product.th bath") }}</del>');
                $('#total').empty().append('{{ __("product.en bath") }} ' + Math.ceil(total).toLocaleString('th-TH') + ' {{ __("product.th bath") }}');
            } else {
                $('#sale').empty();
                $('#total').empty().append('{{ __("product.en bath") }} ' + price.toLocaleString('th-TH') + ' {{ __("product.th bath") }}');
            }
        }

        function cart() {
            const url = '{{ url("/") }}';
            const type = $('input[name=product]').attr('type');
            let id = '';
            const quantity = $('.touchspin').val();

            if (type == 'radio') {
                id = $('input[name=product]:checked').attr('data-id');
            } else {
                id = $('input[name=product]').attr('data-id');
            }

            if (quantity > 0) {
                $.ajax({
                    'url': url + '/add-to-cart',
                    'type': 'post',
                    'data': {
                        id: id,
                        quantity: quantity,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }
                }).done(function(response) {
                    if (response.status == 'success') {
                        toastr['success']('{{ __("product.add cart success") }}', '{{ __("product.success") }}', {
                            closeButton: true,
                            tapToDismiss: false,
                        });

                        $('#cart-item-count').empty().append('<span class="badge badge-pill badge-primary badge-up cart-item-count">' + response.count + '</span>');
                    }
                });
            }
        }
    });
</script>
@endsection
