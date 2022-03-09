@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Product Show')

@section('vendor-style')
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
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" aria-expanded="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="data-tab" data-toggle="pill" href="#data" aria-expanded="false">Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="option-tab" data-toggle="pill" href="#option" aria-expanded="false">Option</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="link-tab" data-toggle="pill" href="#link" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="discount-tab" data-toggle="pill" href="#discount" aria-expanded="false">Discount</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="image-tab" data-toggle="pill" href="#image" aria-expanded="false">Image</a>
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
                                            <label>Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $product->locale('en')->name }}" readonly />
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
                                                <input type="text" class="form-control" value="{{ $product->locale('en')->slug }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-50">
                                        <div id="full-wrapper">
                                            <div id="full-container">
                                                <div class="english-description">
                                                    {!! $product->locale('en')->description !!}
                                                </div>
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
                                                <input type="text" class="form-control" value="{{ $product->locale('en')->meta_title }}" readonly />
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
                                                <input type="text" class="form-control" value="{{ $product->locale('en')->meta_keyword }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $product->locale('en')->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="thai" role="tabpanel" aria-labelledby="thai-tab" aria-expanded="false">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $product->locale('th')->name }}" readonly />
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
                                                <input type="text" class="form-control" value="{{ $product->locale('th')->slug }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-50">
                                        <div id="full-wrapper">
                                            <div id="full-container">
                                                <input type="hidden" name="thai_description">
                                                <div class="thai-description">
                                                    {!! $product->locale('th')->description !!}
                                                </div>
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
                                                <input type="text" class="form-control" value="{{ $product->locale('th')->meta_title }}" readonly />
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
                                                <input type="text" class="form-control" value="{{ $product->locale('th')->meta_keyword }}" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="8" readonly>{{ $product->locale('th')->meta_description }}</textarea>
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
                                    <label>SKU</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="pocket"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $product->sku }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $product->quantity }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $product->price }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" disabled>
                                        <option {{ ($product->status == 'Enabled')? 'selected' : '' }}>Enabled</option>
                                        <option {{ ($product->status == 'Disabled')? 'selected' : '' }}>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- option tab -->
                    <div class="tab-pane" id="option" role="tabpanel" aria-labelledby="option-tab" aria-expanded="false">
                        @foreach ($product->children as $key => $option)
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="pocket"></i></span></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $option->sku }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-12 align-self-start">
                                <div class="form-group">
                                    <label>English Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $option->locale('en')->name }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Thai Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $option->locale('th')->name }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $option->quantity }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $option->price }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        @endforeach
                    </div>

                    <!-- link tab -->
                    <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <label>Categories</label>
                                <select class="select2 form-control" multiple disabled>
                                    @foreach ($categories as $key => $category)
                                    <optgroup label="Category">
                                        <option {{ ($product->hasCategory($category->id))? 'selected' : '' }}>
                                            {{ $category->locale('en')->name }}
                                        </option>
                                        @if ($category->children->count() > 0)
                                        @include('admin.products.recursiveEdit', ['parent' => $category->locale('en')->name, 'children' => $category->children])
                                        @endif
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-1">
                                <label>Filters</label>
                                <select class="select2 form-control" multiple disabled>
                                    @foreach ($filters as $key => $filter)
                                    <optgroup label="{{ $filter->locale('en')->name }}">
                                        @foreach ($filter->children as $key => $option)
                                        <option {{ ($product->hasFilter($option->id))? 'selected' : '' }}>
                                            {{ $option->locale('en')->name }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- discount tab -->
                    <div class="tab-pane" id="discount" role="tabpanel" aria-labelledby="discount-tab" aria-expanded="false">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Range</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ ($product->start_date)? $product->start_date.' to '.$product->end_date : '' }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Percentage</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="percent"></i></span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ $product->percentage }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- image tab -->
                    <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab" aria-expanded="false">
                        <div class="row">
                            @foreach ($product->productImages as $key => $productImage)
                            <div class="col-md-3 mb-1">
                                <img class="rounded img-fluid" src="{{ $productImage->path }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <a href="{{ route('admin.products.index') }}" class="mb-1 mb-sm-0 mr-0 mr-sm-1">
                            <i data-feather="chevron-left"></i> Back to Products
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

<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- <script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script> --}}
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

        var english = new Quill('.english-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Compose a description...',
            readOnly: true,
            theme: 'snow'
        });

        var thai = new Quill('.thai-description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'เขียนคำอธิบาย...',
            readOnly: true,
            theme: 'snow'
        });
    });
</script>
@endsection
