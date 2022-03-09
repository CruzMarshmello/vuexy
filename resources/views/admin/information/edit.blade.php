@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Information Edit')

@section('vendor-style')
<!-- vendor css files -->
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
        <form class="form form-vertical" action="{{ route('admin.information.update',['id' => $information->id]) }}" method="post" enctype="multipart/form-data">
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
                                                <label>Title <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('english_title')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('english_title')
                                                        is-invalid
                                                    @enderror
                                                    " name="english_title" placeholder="Terms and Conditions" value="{{ old('english_title', $information->locale('en')->title) }}" />
                                                </div>
                                                @error ('english_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slug <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('english_slug')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('english_slug')
                                                        is-invalid
                                                    @enderror
                                                    " name="english_slug" placeholder="term-and-conditions" value="{{ old('english_slug', $information->locale('en')->slug) }}" />
                                                </div>
                                                @error ('english_slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-50">
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <input type="hidden" name="english_description">
                                                    <div class="english-description">
                                                        {!! old('english_description', $information->locale('en')->description) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('english_meta_title')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="code"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('english_meta_title')
                                                        is-invalid
                                                    @enderror
                                                    " name="english_meta_title" placeholder="Terms and Conditions" value="{{ old('english_meta_title', $information->locale('en')->meta_title) }}" />
                                                </div>
                                                @error ('english_meta_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="code"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="english_meta_keyword" placeholder="Terms,Conditions" value="{{ old('english_meta_keyword', $information->locale('en')->meta_keyword) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea class="form-control" rows="8" name="english_meta_description" placeholder="Description">{{ old('english_meta_description', $information->locale('en')->meta_description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('thai_title')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('thai_title')
                                                        is-invalid
                                                    @enderror
                                                    " name="thai_title" placeholder="ข้อกำหนด และ เงื่อนไข" value="{{ old('thai_title', $information->locale('th')->title) }}" />
                                                </div>
                                                @error ('thai_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slug <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('thai_slug')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('thai_slug')
                                                        is-invalid
                                                    @enderror
                                                    " name="thai_slug" placeholder="ข้อกำหนด-และ-เงื่อนไข" value="{{ old('thai_slug', $information->locale('th')->slug) }}" />
                                                </div>
                                                @error ('thai_slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-50">
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <input type="hidden" name="thai_description">
                                                    <div class="thai-description">
                                                        {!! old('thai_description', $information->locale('th')->description) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge
                                                @error ('thai_meta_title')
                                                    is-invalid
                                                @enderror
                                                ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="code"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control
                                                    @error ('thai_meta_title')
                                                        is-invalid
                                                    @enderror
                                                    " name="thai_meta_title" placeholder="ข้อกำหนด และ เงื่อนไข" value="{{ old('thai_meta_title', $information->locale('th')->meta_title) }}" />
                                                </div>
                                                @error ('thai_meta_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i data-feather="code"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="thai_meta_keyword" placeholder="ข้อกำหนด,เงื่อนไข" value="{{ old('thai_meta_keyword', $information->locale('th')->meta_keyword) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea class="form-control" rows="8" name="thai_meta_description" placeholder="รายละเอียด">{{ old('thai_meta_description', $information->locale('th')->meta_description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- data tab -->
                        <div class="tab-pane" id="data" role="tabpanel" aria-labelledby="data-tab" aria-expanded="false">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sort Order <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('sort_order')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                            </div>
                                            <input type="number" class="form-control
                                            @error ('sort_order')
                                                is-invalid
                                            @enderror
                                            " name="sort_order" placeholder="0" value="{{ old('sort_order', $information->sort_order) }}" />
                                        </div>
                                        @error ('sort_order')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="Enabled" {{ (old('status', $information->status) == 'Enabled')? 'selected' : '' }}>Enabled</option>
                                            <option value="Disabled" {{ (old('status', $information->status) == 'Disabled')? 'selected' : '' }}>Disabled</option>
                                        </select>
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
            placeholder: 'Compose a content...',
            theme: 'snow'
        });

        var thai = new Quill('.thai-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'เขียนคำอธิบายเนื้อหา...',
            theme: 'snow'
        });


        var form = document.querySelector('form');
        form.onsubmit = function() {
            var englishDescription = $('input[name=english_description]');
            var thaiDescription = $('input[name=thai_description]');

            englishDescription.val(english.root.innerHTML);
            thaiDescription.val(thai.root.innerHTML);
        };
    });
</script>
@endsection
