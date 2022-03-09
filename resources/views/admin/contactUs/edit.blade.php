@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Contact Us Edit')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.contactUs.update', ['id' => $contactUs->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
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
                                                <label>Company <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('english_company')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('english_company')
                                                        is-invalid
                                                    @enderror
                                                    " name="english_company" placeholder="Vuexy Company Limited" value="{{ old('english_company', $contactUs->locale('en')->company) }}" />
                                                </div>
                                                @error ('english_company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control
                                                @error ('english_address')
                                                    is-invalid
                                                @enderror
                                                " rows="8" name="english_address" placeholder="8 Phiboonsongkharm Rd. Nonthaburi 11000 Thailand">{{ old('english_address', $contactUs->locale('en')->address) }}</textarea>
                                                @error ('english_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('thai_company')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('thai_company')
                                                        is-invalid
                                                    @enderror
                                                    " name="thai_company" placeholder="วิวซี่ คอมพานี ลิมิเต็ด" value="{{ old('thai_company', $contactUs->locale('th')->company) }}" />
                                                </div>
                                                @error ('thai_company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control
                                                @error ('thai_address')
                                                    is-invalid
                                                @enderror"
                                                rows="8" name="thai_address" placeholder="8 ถนน พิบูลสงคราม จังหวัด นนทบุรี ประเทศไทย">{{ old('thai_address', $contactUs->locale('th')->address) }}</textarea>
                                                @error ('thai_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
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
                                            <input type="text" class="form-control" name="facebook" placeholder="http://www.facebook.com" value="{{ old('facebook', $contactUs->facebook) }}" />
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
                                            <input type="text" class="form-control" name="instagram" placeholder="http://www.instagram.com" value="{{ old('instagram', $contactUs->instagram) }}" />
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
                                            <input type="text" class="form-control" name="twitter" placeholder="http://www.twitter.com" value="{{ old('twitter', $contactUs->twitter) }}" />
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
                                            <input type="text" class="form-control" name="youtube" placeholder="http://www.youtube.com" value="{{ old('youtube', $contactUs->youtube) }}" />
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
                                            <input type="text" class="form-control" name="telephone" placeholder="+66123456789" value="{{ old('telephone', $contactUs->telephone) }}" />
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
                                            <input type="text" class="form-control" name="fax" placeholder="+6612345678" value="{{ old('fax', $contactUs->fax) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex flex-sm-row flex-column">
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
