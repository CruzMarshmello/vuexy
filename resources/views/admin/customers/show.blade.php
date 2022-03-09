@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Customer Show')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" aria-expanded="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-book-tab" data-toggle="pill" href="#address-book" aria-expanded="false">Address Book</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <!-- general tab -->
                    <div role="tabpanel" class="tab-pane active" id="general" aria-labelledby="general-tab" aria-expanded="true">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $user->full_name }}" readonly />
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
                                        <input type="text" class="form-control" value="{{ $user->email }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" disabled>
                                        <option {{ ($user->status == 'Active')? 'selected' : '' }}>Active</option>
                                        <option {{ ($user->status == 'Blocked')? 'selected' : '' }}>Blocked</option>
                                        <option {{ ($user->status == 'Deactivated')? 'selected' : '' }}>Deactivated</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- data tab -->
                    <div class="tab-pane" id="address-book" role="tabpanel" aria-labelledby="address-book-tab" aria-expanded="false">
                        @foreach ($user->addressBooks as $key => $addressBook)
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Location</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="map-pin"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->location }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->full_name }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->address_1 }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->address_2 }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Sub District</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->sub_district }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>District</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->district }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Province</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->province }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="file-text"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $addressBook->postal_code }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="flag"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->country }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $addressBook->telephone }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.customers.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
