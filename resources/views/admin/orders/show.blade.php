@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Order Show')

@section('content')
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Code</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="hash"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $order->code }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $order->email }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Brand</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $order->brand }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Transaction</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="pocket"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $order->transaction }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Parcel</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="truck"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $order->parcel }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header" style="margin-top: -30px;">
                <h4 class="card-title">Shipping</h4>
                @php
                $shipping = unserialize($order->shipping);
                @endphp
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['full_name'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address 1</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['address_1'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address 2</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['address_2'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub District</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['sub_district'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>District</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['district'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Province</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['province'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['postal_code'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="flag"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['country'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telephone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $shipping['telephone'] }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header" style="margin-top: -30px;">
                <h4 class="card-title">Billing</h4>
                @php
                $billing = unserialize($order->billing);
                @endphp
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['full_name'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address 1</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['address_1'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address 2</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['address_2'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub District</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['sub_district'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>District</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['district'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Province</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['province'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['postal_code'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="flag"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['country'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telephone</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $billing['telephone'] }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="py-1">Item Description</th>
                            <th class="py-1">Amount</th>
                            <th class="py-1">Price</th>
                            <th class="py-1">Total</th>
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
                                <a href="{{ route('guest.products.show', ['slug' => $item['slug']['en']]) }}">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar mr-50"><img src="{{ $item['path'] }}" style="height:40px; width:40px;"></div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="card-text font-weight-bold mb-25">{{ $item['name']['en'] }}</p>
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
                                <span class="font-weight-bold">Bath {{ number_format($item['total']) }}</span>
                            </td>
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                        @php
                        $summary = unserialize($order->summary);
                        @endphp
                        <tr style="border:0px;">
                            <td colspan="2"></td>
                            <td>Total:</td>
                            <td><strong>Bath {{ number_format($summary['total']) }}</strong></td>
                        </tr>
                        <tr style="border:0px;">
                            <td colspan="2"></td>
                            <td>Discount:</td>
                            <td><strong>Bath {{ number_format($summary['total'] * $summary['coupon']['percentage'] / 100) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>Grand Total:</td>
                            <td><strong>Bath {{ number_format($summary['grandTotal']) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-body" style="margin-top:-30px;">
                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.orders.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
