@extends('guest.layouts.contentLayoutMaster')

@section('title'){{ __('order.meta title') }}@endsection
@section('keyword'){{ __('order.meta keyword') }}@endsection
@section('description'){{ __('order.meta description') }}@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
<section class="invoice-preview-wrapper">
    <div class="row invoice-preview">
        <div class="col-xl-9 col-md-8 col-12">
            <div class="card invoice-preview-card">
                <div class="card-body invoice-padding pb-0">
                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                        <div>
                            <h4 class="invoice-title">
                                {{ __('order.order') }}
                                <span class="invoice-number">#{{ $order->code }}</span>
                            </h4>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">{{ __('order.created at') }}</p>
                                <p class="invoice-date">{{ $order->created_at }}</p>
                            </div>
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">{{ __('order.parcel') }}</p>
                                <p class="invoice-date">
                                    @if ($order->parcel == '')
                                    <span class="text-warning">
                                        {{ __('order.waiting') }}
                                    </span>
                                    @else
                                    {{ $order->parcel }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="invoice-spacing" />

                <div class="card-body invoice-padding pt-0">
                    <div class="row invoice-spacing">
                        <div class="col-xl-8 p-0">
                            <h6 class="mb-2">{{ __('order.shipping') }} : </h6>
                            @php
                            $shipping = unserialize($order->shipping);
                            @endphp
                            <h6 class="mb-25">{{ $shipping['full_name']}}</h6>
                            <p class="card-text mb-25">{{ $shipping['address_1']}}</p>
                            <p class="card-text mb-25">{{ $shipping['address_2']}}</p>
                            <p class="card-text mb-25">{{ $shipping['sub_district']}}, {{ $shipping['district']}}, {{ $shipping['province']}} {{ $shipping['postal_code']}}</p>
                            <p class="card-text mb-25">{{ $shipping['country']}}</p>
                            <p class="card-text mb-0">{{ $shipping['telephone'] }}</p>
                        </div>

                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                            <h6 class="mb-2">{{ __('order.billing') }} : </h6>
                            @php
                            $billing = unserialize($order->billing);
                            @endphp
                            <h6 class="mb-25">{{ $billing['full_name']}}</h6>
                            <p class="card-text mb-25">{{ $billing['address_1']}}</p>
                            <p class="card-text mb-25">{{ $billing['address_2']}}</p>
                            <p class="card-text mb-25">{{ $billing['sub_district']}}, {{ $billing['district']}}, {{ $billing['province']}} {{ $billing['postal_code']}}</p>
                            <p class="card-text mb-25">{{ $billing['country']}}</p>
                            <p class="card-text mb-0">{{ $billing['telephone'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="py-1">{{ __('order.item description') }}</th>
                                <th class="py-1">{{ __('order.amount') }}</th>
                                <th class="py-1">{{ __('order.price') }}</th>
                                <th class="py-1">{{ __('order.total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $items = unserialize($order->cart);
                            $no = 0;
                            @endphp
                            @foreach ($items as $key => $item)
                            <tr>
                                <td {{ ($no == 0)? 'class="py-1"' : 'class="border-bottom"' }}>
                                    <a href="{{ route('guest.products.show', ['slug' => $item['slug'][session()->get('locale')]]) }}">
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar mr-50"><img src="{{ $item['path'] }}" style="height:40px; width:40px;"></div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="card-text font-weight-bold mb-25">{{ $item['name'][session()->get('locale')] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="py-1">
                                    <span class="font-weight-bold">{{ $item['quantity'] }}</span>
                                </td>
                                <td class="py-1">
                                    <span class="font-weight-bold">{{ number_format($item['price']) }}</span>
                                </td>
                                <td class="py-1">
                                    <span class="font-weight-bold">{{ __('order.en bath') }} {{ number_format($item['total']) }} {{ __('order.th bath') }}</span>
                                </td>
                            </tr>
                            @php
                            $no++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-body invoice-padding pb-0">
                    <div class="row invoice-sales-total-wrapper">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0">
                                <span class="font-weight-bold">{{ __('order.payment') }}:</span> <span class="ml-75">{{ __('order.success') }}</span>
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                            @php
                            $summary = unserialize($order->summary);
                            $discount = $summary['total'] * $summary['coupon']['percentage'] / 100;
                            @endphp
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('order.total') }}:</p>
                                    <p class="invoice-total-amount">{{ __('order.en bath') }} {{ number_format($summary['total']) }} {{ __('order.th bath') }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('order.discount') }}:</p>
                                    <p class="invoice-total-amount">{{ __('order.en bath') }} {{ number_format($discount) }} {{ __('order.th bath') }}</p>
                                </div>
                                <hr class="my-50" />
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('order.grand total') }}:</p>
                                    <p class="invoice-total-amount">{{ __('order.en bath') }} {{ number_format($summary['grandTotal']) }} {{ __('order.th bath') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="invoice-spacing" />

                <div class="card-body invoice-padding pt-0">
                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">{{ __('order.note') }}:</span>
                            <span>{{ __('order.thank you') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary btn-block mb-75" href="{{ route('guest.orders.print', ['code' => $order->code, 'email' => $order->email, 'type' => 'invoice']) }}">
                        {{ __('order.download invoice') }}
                    </a>
                    <a class="btn btn-primary btn-block mb-75" href="{{ route('guest.orders.print', ['code' => $order->code, 'email' => $order->email, 'type' => 'tax']) }}">
                        {{ __('order.download tax') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
