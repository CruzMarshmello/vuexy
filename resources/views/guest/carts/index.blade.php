@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('cart.meta title') }}@endsection
@section('keyword'){{ __('cart.meta keyword') }}@endsection
@section('description'){{ __('cart.meta description') }}@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<div class="bs-stepper checkout-tab-steps">
    <!-- Wizard starts -->
    <div class="bs-stepper-header">
        <div class="step" data-target="#step-cart">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{ __('cart.cart') }}</span>
                    <span class="bs-stepper-subtitle">{{ __('cart.cart details') }}</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
        </div>
        <div class="step" data-target="#step-address">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="home" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{ __('cart.address') }}</span>
                    <span class="bs-stepper-subtitle">{{ __('cart.address details') }}</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
        </div>
        <div class="step" data-target="#step-payment">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="credit-card" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{ __('cart.payment') }}</span>
                    <span class="bs-stepper-subtitle">{{ __('cart.payment details') }}</span>
                </span>
            </button>
        </div>
    </div>
    <!-- Wizard ends -->

    <div class="bs-stepper-content">
        <!-- Cart starts -->
        <div id="step-cart" class="content">
            <div id="place-order" class="list-view product-checkout">
                <!-- Left starts -->
                <div class="checkout-items">
                    @foreach (session()->get('cart') as $key => $item)
                    <div class="card ecommerce-card" id="item-{{ $key }}">
                        <div class="item-img">
                            <a href="{{url('app/ecommerce/details')}}">
                                <img src="{{ $item['path'] }}" alt="img-placeholder" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <h6 class="mb-0">
                                    <a href="{{ route('guest.products.show',['slug' => $item['slug'][session()->get('locale')]]) }}" class="text-body">
                                        {{ $item['name'][session()->get('locale')] }}
                                    </a>
                                </h6>
                            </div>
                            <span class="text-secondary mb-5">
                                {{ __('cart.price') }}
                                @if ($item['percentage'] != 0)
                                {{ number_format($item['price'] - ($item['price'] * $item['percentage'] / 100)) }}
                                @else
                                {{ number_format($item['price']) }}
                                @endif
                            </span>
                            <div class="item-quantity">
                                <span class="quantity-title">{{ __('cart.Qty') }}:</span>
                                <div class="input-group input-group-lg" id="touchspin">
                                    <input type="number" class="touchspin" id="quantity-{{ $key }}" data-key="{{ $key }}" value="{{ $item['quantity'] }}" />
                                </div>
                            </div>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">
                                        {{ __('cart.en bath') }}
                                        <span id="total-{{ $key }}">{{ number_format($item['total']) }}</span>
                                        {{ __('cart.th bath') }}
                                    </h4>
                                </div>
                            </div>
                            <button type="button" class="btn btn-light mt-1" id="btnRemove" data-key="{{ $key }}">
                                <i data-feather="x" class="align-middle mr-25"></i>
                                <span>{{ __('cart.remove') }}</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Left ends -->

                <!-- Right starts -->
                <div class="checkout-options">
                    <div class="card">
                        <div class="card-body">
                            <label class="section-label mb-1">{{ __('cart.options') }}</label>
                            <div class="coupons input-group input-group-merge">
                                <input type="text" class="form-control" id="code" placeholder="{{ __('cart.placeholder coupon') }}" aria-label="Coupons" aria-describedby="input-coupons" />
                                <div class="input-group-append">
                                    <button class="input-group-text text-primary" id="btnCoupon">{{ __('cart.apply') }}</button>
                                </div>
                            </div>
                            <hr />
                            <div class="price-details">
                                <h6 class="price-title">{{ __('cart.price details') }}</h6>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title">{{ __('cart.total') }}</div>
                                        <div class="detail-amt">
                                            {{ __('cart.en bath') }}
                                            <span id="total">0</span>
                                            {{ __('cart.th bath') }}
                                        </div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">{{ __('cart.discount') }}</div>
                                        <div class="detail-amt discount-amt text-success">
                                            {{ __('cart.en bath') }}
                                            -<span id="discount">0</span>
                                            {{ __('cart.th bath') }}
                                        </div>
                                    </li>
                                </ul>
                                <hr />
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title detail-total">{{ __('cart.grand total') }}</div>
                                        <div class="detail-amt font-weight-bolder">
                                            {{ __('cart.en bath') }}
                                            <span id="grand-total">0</span>
                                            {{ __('cart.th bath') }}
                                        </div>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-block place-order" id="btnNextAddress">{{ __('cart.place order') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right ends -->
            </div>
        </div>
        <!-- Cart ends -->

        <!-- Address starts -->
        <div id="step-address" class="content">
            <div class="list-view product-checkout">
                <!-- Left starts -->
                <div class="card">
                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title">{{ __('cart.shipping') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(Auth::check() && Auth::user()->addressBooks->count() > 0)
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="add-type">{{ __('cart.location') }}</label>
                                    <select class="form-control" id="shipping">
                                        <option value="">{{ __('cart.please selected') }}</option>
                                        @foreach (Auth::user()->addressBooks as $key => $addressBook)
                                        <option value="{{ $addressBook->id }}">{{ $addressBook->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.full name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-full-name" data-type="shipping" placeholder="{{ __('cart.placeholder full name') }}" @php $address = session()->get('address');
                                    @endphp
                                    @if (is_array($address))
                                    value="{{ $address['shipping']['full_name'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-full-name-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.address 1') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-address-1" data-type="shipping" placeholder="{{ __('cart.placeholder address 1') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['address_1'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-address-1-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.address 2') }}</label>
                                    <input type="text" class="form-control" id="shipping-address-2" data-type="shipping" placeholder="{{ __('cart.placeholder address 2') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['address_2'] }}"
                                    @endif
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.sub district') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-sub-district" data-type="shipping" placeholder="{{ __('cart.placeholder sub district') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['sub_district'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-sub-district-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.district') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-district" data-type="shipping" placeholder="{{ __('cart.placeholder district') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['district'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-district-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.province') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-province" data-type="shipping" placeholder="{{ __('cart.placeholder province') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['province'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-province-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.postal code') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="shipping-postal-code" data-type="shipping" placeholder="11000" @if (is_array($address))
                                    value="{{ $address['shipping']['postal_code'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-postal-code-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.country') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-country" data-type="shipping" placeholder="{{ __('cart.placeholder country') }}" @if (is_array($address))
                                    value="{{ $address['shipping']['country'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-country-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.telephone') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="shipping-telephone" data-type="shipping" placeholder="012-345-6789" @if (is_array($address))
                                    value="{{ $address['shipping']['telephone'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="shipping-telephone-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title">{{ __('cart.billing') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(Auth::check() && Auth::user()->addressBooks->count() > 0)
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="add-type">{{ __('cart.location') }}</label>
                                    <select class="form-control" id="billing">
                                        <option value="">{{ __('cart.please selected') }}</option>
                                        @foreach (Auth::user()->addressBooks as $key => $addressBook)
                                        <option value="{{ $addressBook->id }}">{{ $addressBook->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.full name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-full-name" data-type="billing" placeholder="{{ __('cart.placeholder full name') }}" @if (is_array($address))
                                    value="{{ $address['billing']['full_name'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-full-name-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.address 1') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-address-1" data-type="billing" placeholder="{{ __('cart.placeholder address 1') }}" @if (is_array($address))
                                    value="{{ $address['billing']['address_1'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-address-1-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.address 2') }}</label>
                                    <input type="text" class="form-control" id="billing-address-2" data-type="billing" placeholder="{{ __('cart.placeholder address 2') }}" @if (is_array($address))
                                    value="{{ $address['billing']['address_2'] }}"
                                    @endif
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.sub district') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-sub-district" data-type="billing" placeholder="{{ __('cart.placeholder sub district') }}" @if (is_array($address))
                                    value="{{ $address['billing']['sub_district'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-sub-district-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.district') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-district" data-type="billing" placeholder="{{ __('cart.placeholder district') }}" @if (is_array($address))
                                    value="{{ $address['billing']['district'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-district-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.province') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-province" data-type="billing" placeholder="{{ __('cart.placeholder province') }}" @if (is_array($address))
                                    value="{{ $address['billing']['province'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-province-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.postal code') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="billing-postal-code" data-type="billing" placeholder="11000" @if (is_array($address))
                                    value="{{ $address['billing']['postal_code'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-postal-code-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.country') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-country" data-type="billing" placeholder="{{ __('cart.placeholder country') }}" @if (is_array($address))
                                    value="{{ $address['billing']['country'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-country-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-2">
                                    <label for="checkout-name">{{ __('cart.telephone') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="billing-telephone" data-type="billing" placeholder="012-345-6789" @if (is_array($address))
                                    value="{{ $address['billing']['telephone'] }}"
                                    @endif
                                    />
                                    <div class="invalid-feedback" id="billing-telephone-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left ends -->

                <!-- Right starts -->
                <div class="customer-card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('cart.send to email') }}</h4>
                        </div>
                        <div class="card-body actions">
                            <div class="form-group mb-2">
                                <label for="checkout-name">{{ __('cart.email') }} <span class="text-danger">*</span></label>
                                @if (Auth::user())
                                <input type="text" class="form-control" id="e-mail" placeholder="john@example.com" value="{{ Auth::user()->email }}" readonly/>
                                @else
                                <input type="text" class="form-control" id="e-mail" placeholder="john@example.com"
                                @if (is_array($address))
                                value="{{ $address['email'] }}"
                                @endif
                                />
                                @endif
                                <div class="invalid-feedback" id="e-mail-error"></div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block delivery-address mt-2" id="btnNextPayment">
                                {{ __('cart.deliver') }}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Right ends -->
            </div>
        </div>
        <!-- Address ends -->

        <!-- Payment starts -->
        <div id="step-payment" class="content">
            <div class="list-view product-checkout">
                <!-- Left ends -->
                <div class="payment-type">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">
                            <h4 class="card-title">{{ $deliveryAndReturns->locale(session()->get('locale'))->title }}</h4>
                        </div>
                        <div class="card-body">
                            {!! $deliveryAndReturns->locale(session()->get('locale'))->description !!}
                        </div>
                    </div>
                </div>
                <!-- Left ends -->

                <!-- Right start -->
                <div class="amount-payable checkout-options">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('cart.payment') }}</h4>
                        </div>
                        <div class="card-body actions">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="agree" />
                                <label class="custom-control-label" for="agree">
                                    {{ __('cart.agree') }}{{ $deliveryAndReturns->locale(session()->get('locale'))->title }}
                                </label>
                            </div>
                            <form id="frmPayment" method="POST" action="{{ route('guest.orders.store') }}">
                                @csrf
                                <input type="hidden" name="omiseToken">
                                <input type="hidden" name="omiseSource">
                                <button type="submit" class="btn btn-primary btn-block mt-2" id="btnPayment" disabled>{{ __('cart.payment') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Right ends -->
            </div>
        </div>
        <!-- Payment ends -->
    </div>
</div>
@endsection

@section('vendor-script')
<!-- Vendor js files -->
<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/pages/app-ecommerce-checkout.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
<script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>

<script type="text/javascript">
    $(function() {
        const checkoutWizard = document.querySelector('.checkout-tab-steps');
        const wizard = new Stepper(checkoutWizard, {
            linear: true
        });

        wizard.next();
        wizard.previous();
        summary();

        $('.checkout-items').on('change', '.touchspin', function() {
            const url = '{{ url("/") }}';
            const key = $(this).attr('data-key');
            const quantity = $(this).val();

            $.ajax({
                'url': url + '/update-to-cart',
                'type': 'post',
                'data': {
                    key: key,
                    quantity: quantity,
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'remove success') {
                    toastr['error']('{{ __("cart.remove cart success") }}', '{{ __("cart.remove success") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });

                    $('#item-' + key).slideUp('medium', function() {
                        $(this).remove();
                    });

                    count(response.count);
                } else if (response.status == 'out of stock') {
                    toastr['error']('{{ __("cart.oos") }}', '{{ __("cart.not enough") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });

                    $('#item-' + key).slideUp('medium', function() {
                        $(this).remove();
                    });

                    count(response.count);
                } else if (response.status == 'not enough') {
                    toastr['warning']('{{ __("cart.insufficient") }}', '{{ __("cart.not enough") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });

                    $('#quantity-' + key).val(response.quantity);
                    $('#total-' + key).empty().append(response.total);

                    summary();
                } else if (response.status == 'success') {
                    $('#total-' + key).empty().append(response.total);

                    summary();
                }
            });
        });

        $('.checkout-items').on('click', '#btnRemove', function() {
            const url = '{{ url("/") }}';
            const key = $(this).attr('data-key');

            $.ajax({
                'url': url + '/remove-to-cart',
                'type': 'post',
                'data': {
                    key: key,
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'success') {
                    toastr['error']('{{ __("cart.remove cart success") }}', '{{ __("cart.remove success") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });

                    $('#item-' + key).slideUp('medium', function() {
                        $(this).remove();
                    });

                    count(response.count);
                }
            });
        });

        $('.checkout-options').on('click', '#btnCoupon', function() {
            const url = '{{ url("/") }}';

            $.ajax({
                'url': url + '/apply-coupon',
                'type': 'post',
                'data': {
                    code: $('#code').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'can not code') {
                    toastr['error']('{{ __("cart.can not code") }}', '{{ __("cart.can not coupon") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });
                } else if (response.status == 'expired') {
                    toastr['warning']('{{ __("cart.expired") }}', '{{ __("cart.coupon expired") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });
                } else if (response.status == 'period') {
                    toastr['warning']('{{ __("cart.period") }}', '{{ __("cart.coupon period") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });
                } else if (response.status == 'full') {
                    toastr['warning']('{{ __("cart.full") }}', '{{ __("cart.coupon full") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });
                } else if (response.status == 'success') {
                    summary();
                }
            });
        });

        function count(count) {
            if (count == 0) {
                window.location.href = '{{ url("/") }}';
            } else {
                $('#cart-item-count').empty().append('<span class="badge badge-pill badge-primary badge-up cart-item-count">' + count + '</span>');

                summary();
            }
        }

        function summary() {
            const url = '{{ url("/") }}';

            $.ajax({
                'url': url + '/summary',
                'type': 'post',
                'data': {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'success') {
                    $('#total').empty().append(response.total);
                    $('#discount').empty().append(response.discount);
                    $('#grand-total').empty().append(response.grandTotal);
                }
            });
        }

        $('#step-cart').on('click', '#btnNextAddress', function() {
            wizard.next();
        });

        $('#step-address').on('change', '#shipping', function() {
            const id = $(this).val();

            if (id != '') {
                const url = '{{ url("/") }}';

                $.ajax({
                    'url': url + '/shipping/' + id,
                    'type': 'get'
                }).done(function(response) {
                    $('#shipping-full-name').val(response.addressBook.full_name);
                    $('#shipping-address-1').val(response.addressBook.address_1);
                    $('#shipping-address-2').val(response.addressBook.address_2);
                    $('#shipping-sub-district').val(response.addressBook.sub_district);
                    $('#shipping-district').val(response.addressBook.district);
                    $('#shipping-province').val(response.addressBook.province);
                    $('#shipping-postal-code').val(response.addressBook.postal_code);
                    $('#shipping-country').val(response.addressBook.country);
                    $('#shipping-telephone').val(response.addressBook.telephone);
                });
            } else {
                $('input[data-type=shipping]').each(function() {
                    $(this).val('');
                })
            }
        });

        $('#step-address').on('change', '#billing', function() {
            const id = $(this).val();

            if (id != '') {
                const url = '{{ url("/") }}';

                $.ajax({
                    'url': url + '/billing/' + id,
                    'type': 'get'
                }).done(function(response) {
                    $('#billing-full-name').val(response.addressBook.full_name);
                    $('#billing-address-1').val(response.addressBook.address_1);
                    $('#billing-address-2').val(response.addressBook.address_2);
                    $('#billing-sub-district').val(response.addressBook.sub_district);
                    $('#billing-district').val(response.addressBook.district);
                    $('#billing-province').val(response.addressBook.province);
                    $('#billing-postal-code').val(response.addressBook.postal_code);
                    $('#billing-country').val(response.addressBook.country);
                    $('#billing-telephone').val(response.addressBook.telephone);
                });
            } else {
                $('input[data-type=billing]').each(function() {
                    $(this).val('');
                });
            }
        });

        $('#step-address').on('click', '#btnNextPayment', function() {
            const url = '{{ url("/") }}';

            $.ajax({
                'url': url + '/address',
                'type': 'post',
                'data': {
                    shipping_full_name: $('#shipping-full-name').val(),
                    shipping_address_1: $('#shipping-address-1').val(),
                    shipping_address_2: $('#shipping-address-2').val(),
                    shipping_sub_district: $('#shipping-sub-district').val(),
                    shipping_district: $('#shipping-district').val(),
                    shipping_province: $('#shipping-province').val(),
                    shipping_postal_code: $('#shipping-postal-code').val(),
                    shipping_country: $('#shipping-country').val(),
                    shipping_telephone: $('#shipping-telephone').val(),

                    billing_full_name: $('#billing-full-name').val(),
                    billing_address_1: $('#billing-address-1').val(),
                    billing_address_2: $('#billing-address-2').val(),
                    billing_sub_district: $('#billing-sub-district').val(),
                    billing_district: $('#billing-district').val(),
                    billing_province: $('#billing-province').val(),
                    billing_postal_code: $('#billing-postal-code').val(),
                    billing_country: $('#billing-country').val(),
                    billing_telephone: $('#billing-telephone').val(),

                    email: $('#e-mail').val(),

                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'error') {
                    toastr['error']('{{ __("cart.error message") }}', '{{ __("cart.error") }}', {
                        closeButton: true,
                        tapToDismiss: false,
                    });

                    $('input[data-type]').each(function() {
                        $(this).removeClass('is-invalid');
                    });

                    $('#e-mail').removeClass('is-invalid');

                    $('.invalid-feedback').each(function() {
                        $(this).empty();
                    });

                    $.each(response.errors, function(key, val) {
                        if (key == 'shipping_full_name') {
                            $('#shipping-full-name').addClass('is-invalid');
                            $('#shipping-full-name-error').append(val);
                        } else if (key == 'shipping_address_1') {
                            $('#shipping-address-1').addClass('is-invalid');
                            $('#shipping-address-1-error').append(val);
                        } else if (key == 'shipping_sub_district') {
                            $('#shipping-sub-district').addClass('is-invalid');
                            $('#shipping-sub-district-error').append(val);
                        } else if (key == 'shipping_district') {
                            $('#shipping-district').addClass('is-invalid');
                            $('#shipping-district-error').append(val);
                        } else if (key == 'shipping_province') {
                            $('#shipping-province').addClass('is-invalid');
                            $('#shipping-province-error').append(val);
                        } else if (key == 'shipping_postal_code') {
                            $('#shipping-postal-code').addClass('is-invalid');
                            $('#shipping-postal-code-error').append(val);
                        } else if (key == 'shipping_country') {
                            $('#shipping-country').addClass('is-invalid');
                            $('#shipping-country-error').append(val);
                        } else if (key == 'shipping_telephone') {
                            $('#shipping-telephone').addClass('is-invalid');
                            $('#shipping-telephone-error').append(val);
                        } else if (key == 'billing_full_name') {
                            $('#billing-full-name').addClass('is-invalid');
                            $('#billing-full-name-error').append(val);
                        } else if (key == 'billing_address_1') {
                            $('#billing-address-1').addClass('is-invalid');
                            $('#billing-address-1-error').append(val);
                        } else if (key == 'billing_sub_district') {
                            $('#billing-sub-district').addClass('is-invalid');
                            $('#billing-sub-district-error').append(val);
                        } else if (key == 'billing_district') {
                            $('#billing-district').addClass('is-invalid');
                            $('#billing-district-error').append(val);
                        } else if (key == 'billing_province') {
                            $('#billing-province').addClass('is-invalid');
                            $('#billing-province-error').append(val);
                        } else if (key == 'billing_postal_code') {
                            $('#billing-postal-code').addClass('is-invalid');
                            $('#billing-postal-code-error').append(val);
                        } else if (key == 'billing_country') {
                            $('#billing-country').addClass('is-invalid');
                            $('#billing-country-error').append(val);
                        } else if (key == 'billing_telephone') {
                            $('#billing-telephone').addClass('is-invalid');
                            $('#billing-telephone-error').append(val);
                        } else if (key == 'email') {
                            $('#e-mail').addClass('is-invalid');
                            $('#e-mail-error').append(val);
                        }
                    });
                } else if (response.status == 'success') {
                    wizard.next();

                    $('.omise-checkout-button').addClass('btn btn-primary btn-block mt-2');
                    $('.omise-checkout-button').attr('disabled', 'disabled');
                }
            });
        });

        $('.custom-checkbox').on('click', '#agree', function() {
            if ($(this).is(':checked')) {
                $('#btnPayment').removeAttr('disabled');
            } else {
                $('#btnPayment').attr('disabled', 'disabled');
            }
        });

        $('#frmPayment').on('click', '#btnPayment', function(e) {
            e.preventDefault();
            const url = '{{ url("/") }}';

            $.ajax({
                'url': url + '/summary',
                'type': 'post',
                'data': {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                if (response.status == 'success') {
                    OmiseCard.configure({
                        'publicKey': '{{ env("OMISE_PUBLIC_KEY") }}',
                        'data-image': '{{ asset("images/logo/favicon.ico") }}',
                        'frameLabel': 'Vuexy',
                        'amount': response.grandTotal.replace(',', '') * 100,
                        'submitLabel': '{{ __("cart.pay") }}',
                        'currency': '{{ __("cart.en bath") }}{{ __("cart.th bath") }}',
                    });

                    OmiseCard.open({
                        defaultPaymentMethod: "credit_card",
                        onCreateTokenSuccess: (nonce) => {
                            if (nonce.startsWith("tokn_")) {
                                $('input[name=omiseToken]').val(nonce);
                            } else {
                                $('input[name=omiseSource]').val(nonce);
                            };

                            $('#frmPayment').submit();
                        }
                    });
                }
            })
        });
    });
</script>
@endsection
