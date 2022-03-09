@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Contact Us Show')

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
                <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="false">Data</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <!-- general tab -->
                    <div role="tabpanel" class="tab-pane active" id="general" aria-labelledby="general-tab" aria-expanded="true">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" id="english-tab" data-toggle="pill" href="#english" aria-expanded="true"><i class="flag-icon flag-icon-us"></i> English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="thai-tab" data-toggle="pill" href="#thai" aria-expanded="false"><i class="flag-icon flag-icon-th"></i> Thai</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="english" aria-labelledby="english-tab" aria-expanded="true">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $contactUs->locale('en')->company }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $contactUs->locale('en')->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $contactUs->locale('th')->company }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $contactUs->locale('th')->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- data tab -->
                    <div class="tab-pane" id="data" role="tabpanel" aria-labelledby="data-tab" aria-expanded="false">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Social Media</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="facebook"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->facebook }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="instagram"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->instagram }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="twitter"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->twitter }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>YouTube</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="youtube"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->youtube }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h4>Other</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="phone-call"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->telephone }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="printer"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $contactUs->fax }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.contactUs.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
