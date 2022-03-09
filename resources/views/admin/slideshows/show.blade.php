@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Slideshow Show')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection

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
                                            <label>Title</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $slideshow->locale('en')->title }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="link"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $slideshow->locale('en')->url }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-50">
                                        <div id="full-wrapper">
                                            <div id="full-container">
                                                <div class="english-description">
                                                    {!! $slideshow->locale('en')->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $slideshow->locale('th')->title }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="link"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $slideshow->locale('th')->url }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-50">
                                        <div id="full-wrapper">
                                            <div id="full-container">
                                                <div class="thai-description">
                                                    {!! $slideshow->locale('th')->description !!}
                                                </div>
                                            </div>
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
                                <img class="img-fluid rounded mb-1" src="{{ $slideshow->image }}">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $slideshow->sort_order }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" disabled>
                                        <option {{ ($slideshow->status == 'Enabled')? 'selected' : '' }}>Enabled</option>
                                        <option {{ ($slideshow->status == 'Disabled')? 'selected' : '' }}>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.slideshows.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Slideshows
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection

@section('page-script')
<script type="text/javascript">
    $(function() {
        // Editor
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'direction': 'rtl'
            }],

            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];

        var english = new Quill('.english-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Compose a short description...',
            readOnly: true,
            theme: 'snow'
        });

        var thai = new Quill('.thai-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'เขียนคำอธิบายสั้นๆ...',
            readOnly: true,
            theme: 'snow'
        });
    });
</script>
@endsection
