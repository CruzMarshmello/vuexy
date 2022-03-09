@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Order Edit')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.orders.update', ['id' => $order->id]) }}" method="post">
            @csrf
            @method('put')
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
                                    <input type="text" class="form-control" name="parcel" placeholder="EMS123456TH" value="{{ old('parcel', $order->parcel) }}" />
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
                                <label>Full Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_full_name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_full_name')
                                        is-invalid
                                    @enderror
                                    " name="shipping_full_name" placeholder="John Doe" value="{{ old('shipping_full_name', $shipping['full_name']) }}" />
                                </div>
                                @error ('shipping_full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address 1 <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_address_1')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_address_1')
                                        is-invalid
                                    @enderror
                                    " name="shipping_address_1" placeholder="123 Phiboonsongkharm Rd." value="{{ old('shipping_address_1', $shipping['address_1']) }}" />
                                </div>
                                @error ('shipping_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address 2</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="shipping_address_2" placeholder="Optional" value="{{ old('shipping_address_2', $shipping['address_2']) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sub District <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_sub_district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_sub_district')
                                        is-invalid
                                    @enderror
                                    " name="shipping_sub_district" placeholder="Bangkharn" value="{{ old('shipping_sub_district', $shipping['sub_district']) }}" />
                                </div>
                                @error ('shipping_sub_district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_district')
                                        is-invalid
                                    @enderror
                                    " name="shipping_district" placeholder="Mueng" value="{{ old('shipping_district', $shipping['district']) }}" />
                                </div>
                                @error ('shipping_district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Province <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_province')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_province')
                                        is-invalid
                                    @enderror
                                    " name="shipping_province" placeholder="Nonthaburi" value="{{ old('shipping_province', $shipping['province']) }}" />
                                </div>
                                @error ('shipping_province')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Postal Code <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_postal_code')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_postal_code')
                                        is-invalid
                                    @enderror
                                    " name="shipping_postal_code" placeholder="11000" value="{{ old('shipping_postal_code', $shipping['postal_code']) }}" />
                                </div>
                                @error ('shipping_postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_country')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="flag"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_country')
                                        is-invalid
                                    @enderror
                                    " name="shipping_country" placeholder="Thailand" value="{{ old('shipping_country', $shipping['country']) }}" />
                                </div>
                                @error ('shipping_country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telephone <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('shipping_telephone')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('shipping_telephone')
                                        is-invalid
                                    @enderror
                                    " name="shipping_telephone" placeholder="012-345-6789" value="{{ old('shipping_telephone', $shipping['telephone']) }}" />
                                </div>
                                @error ('shipping_telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                                <label>Full Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_full_name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_full_name')
                                        is-invalid
                                    @enderror
                                    " name="billing_full_name" placeholder="John Doe" value="{{ old('billing_full_name', $billing['full_name']) }}" />
                                </div>
                                @error ('billing_full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address 1 <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_address_1')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_address_1')
                                        is-invalid
                                    @enderror
                                    " name="billing_address_1" placeholder="123 Phiboonsongkharm Rd." value="{{ old('billing_address_1', $billing['address_1']) }}" />
                                </div>
                                @error ('billing_address_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address 2</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="billing_address_2" placeholder="Optional" value="{{ old('billing_address_2', $billing['address_2']) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sub District <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_sub_district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_sub_district')
                                        is-invalid
                                    @enderror
                                    " name="billing_sub_district" placeholder="Bangkharn" value="{{ old('billing_sub_district', $billing['sub_district']) }}" />
                                </div>
                                @error ('billing_sub_district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_district')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_district')
                                        is-invalid
                                    @enderror
                                    " name="billing_district" placeholder="Mueng" value="{{ old('billing_district', $billing['district']) }}" />
                                </div>
                                @error ('billing_district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Province <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_province')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_province')
                                        is-invalid
                                    @enderror
                                    " name="billing_province" placeholder="Nonthaburi" value="{{ old('billing_province', $billing['province']) }}" />
                                </div>
                                @error ('billing_province')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Postal Code <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_postal_code')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="file-text"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_postal_code')
                                        is-invalid
                                    @enderror
                                    " name="billing_postal_code" placeholder="11000" value="{{ old('billing_postal_code', $billing['postal_code']) }}" />
                                </div>
                                @error ('billing_postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_country')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="flag"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_country')
                                        is-invalid
                                    @enderror
                                    " name="billing_country" placeholder="Thailand" value="{{ old('billing_country', $billing['country']) }}" />
                                </div>
                                @error ('billing_country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telephone <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('billing_telephone')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('billing_telephone')
                                        is-invalid
                                    @enderror
                                    " name="billing_telephone" placeholder="012-345-6789" value="{{ old('billing_telephone', $billing['telephone']) }}" />
                                </div>
                                @error ('billing_telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
