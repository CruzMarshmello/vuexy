@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Email Compose')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.emails.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <select class="form-control
                                @error ('to')
                                    is-invalid
                                @enderror
                                " name="to">
                                    <option value="" {{ (old('to') == '')? 'selected' : '' }}>Choose</option>
                                    <option value="All" {{ (old('to') == 'all')? 'selected' : '' }}>All</option>
                                    <option value="Customers" {{ (old('to') == 'Customers')? 'selected' : '' }}>Customers</option>
                                    <option value="Subscribes" {{ (old('to') == 'Subscribes')? 'selected' : '' }}>Subscribes</option>
                                </select>
                                @error ('to')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subject <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('subject')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="pocket"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('subject')
                                        is-invalid
                                    @enderror
                                    " name="subject" placeholder="Promotion for You." value="{{ old('subject') }}" />
                                </div>
                                @error ('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 mb-50">
                            <div id="full-wrapper">
                                <div id="full-container">
                                    <input type="hidden" name="message">
                                    <div class="message">
                                        {!! old('message') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Send</button>
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

<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>

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

        var quillMessage = new Quill('.message', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Compose a content...',
            theme: 'snow'
        });


        var form = document.querySelector('form');
        form.onsubmit = function() {
            var message = $('input[name=message]');

            message.val(quillMessage.root.innerHTML);
        };
    });
</script>
@endsection
