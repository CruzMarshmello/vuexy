@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Tag Show')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="english-tab" data-toggle="pill" href="#english" aria-expanded="true"><i class="flag-icon flag-icon-us"></i> English</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="thai-tab" data-toggle="pill" href="#thai" aria-expanded="false"><i class="flag-icon flag-icon-th"></i> Thai</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <!-- english tab -->
                    <div role="tabpanel" class="tab-pane active" id="english" aria-labelledby="english-tab" aria-expanded="true">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="grid"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('en')->name }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="link"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('en')->slug }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="code"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('en')->meta_title }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="code"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('en')->meta_keyword }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" rows="8" readonly>{{ $tag->locale('en')->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- thai tab -->
                    <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="grid"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('th')->name }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="link"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('th')->slug }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="code"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('th')->meta_title }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="code"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $tag->locale('th')->meta_keyword }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" rows="8" readonly>{{ $tag->locale('th')->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.tags.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Tags
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
