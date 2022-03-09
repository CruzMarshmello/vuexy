@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Filter Edit')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.filters.update',['id' => $filter->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filter Group</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>English Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('english_name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('english_name')
                                        is-invalid
                                    @enderror
                                    " name="english_name" placeholder="Colour" value="{{ old('english_name', $filter->locale('en')->name) }}" />
                                </div>
                                @error ('english_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Thai Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge
                                @error ('thai_name')
                                    is-invalid
                                @enderror
                                ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                    </div>
                                    <input type="text" class="form-control
                                    @error ('thai_name')
                                        is-invalid
                                    @enderror
                                    " name="thai_name" placeholder="สี" value="{{ old('thai_name', $filter->locale('th')->name) }}" />
                                </div>
                                @error ('thai_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
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
                                    " name="sort_order" placeholder="0" value="{{ old('sort_order', $filter->sort_order) }}" />
                                </div>
                                @error ('sort_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="margin-top:-30px;">
                    <h4 class="card-title">Options</h4>

                    <button class="btn btn-outline-info text-nowrap" type="button" id="btn-plus">
                        <i data-feather="plus"></i>
                    </button>
                </div>
                <div class="card-body" id="options">
                    @if (!old('options'))
                    @foreach ($filter->children as $key => $option)
                    <div id="option-{{ $key }}">
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label>English Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                        </div>
                                        <input type="hidden" name="options[{{ $key }}][id]" value="{{ $option->id }}">
                                        <input type="text" class="form-control" name="options[{{ $key }}][english_name]" placeholder="Purple" value="{{ $option->locale('en')->name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label>Thai Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="options[{{ $key }}][thai_name]" placeholder="ม่วง" value="{{ $option->locale('th')->name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label>Sort Order <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="options[{{ $key }}][sort_order]" placeholder="0" value="{{ $option->sort_order }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-12">
                                <div class="form-group">
                                    <button class="btn btn-outline-danger text-nowrap" type="button" id="btn-delete" data-id="{{ $key }}">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                    @endforeach
                    @else
                    @foreach (old('options') as $key => $option)
                    <div id="option-{{ $key }}">
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>English Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge
                                    @error('options.'.$key.'.english_name')
                                        is-invalid
                                    @enderror
                                    ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                        </div>
                                        <input type="hidden" name="options[{{ $key }}][id]" value="{{ old('options')[$key]['id'] }}">
                                        <input type="text" class="form-control
                                        @error ('options.'.$key.'.english_name')
                                            is-invalid
                                        @enderror
                                        " name="options[{{ $key }}][english_name]" placeholder="Purple" value="{{ old('options')[$key]['english_name'] }}" />
                                    </div>
                                    @error ('options.'.$key.'.english_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Thai Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge
                                    @error ('options.'.$key.'.thai_name')
                                        is-invalid
                                    @enderror
                                    ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>
                                        </div>
                                        <input type="text" class="form-control
                                        @error ('options.'.$key.'.thai_name')
                                            is-invalid
                                        @enderror
                                        " name="options[{{ $key }}][thai_name]" placeholder="ม่วง" value="{{ old('options')[$key]['thai_name'] }}" />
                                    </div>
                                    @error ('options.'.$key.'.thai_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 col-12 align-self-start">
                                <div class="form-group">
                                    <label>Sort Order <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge
                                    @error ('options.'.$key.'.sort_order')
                                        is-invalid
                                    @enderror
                                    ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="shuffle"></i></span>
                                        </div>
                                        <input type="number" class="form-control
                                        @error ('options.'.$key.'.sort_order')
                                            is-invalid
                                        @enderror
                                        " name="options[{{ $key }}][sort_order]" placeholder="0" value="{{ old('options')[$key]['sort_order'] }}" />
                                    </div>
                                    @error ('options.'.$key.'.sort_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1 col-12 align-self-center">
                                <div class="form-group">
                                    <button class="btn btn-outline-danger text-nowrap" type="button" id="btn-delete" data-id="{{ $key }}">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                    @endforeach
                    @endif
                </div>

                <div class="card-body" style="margin-top:-50px;">
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

@section('page-script')
<script>
    $(function() {

        $('.card-header').on('click', '#btn-plus', function() {
            const i = parseInt($('button[id = btn-delete]').last().attr('data-id')) + 1 | 0;

            let div = '<div id="option-' + i + '">';
            div += '<div class="row d-flex align-items-end">';
            div += '<div class="col-md-4 col-12">';
            div += '<div class="form-group">';
            div += '<label>English Name <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>';
            div += '</div>';
            div += '<input type="hidden" class="form-control" name="options[' + i + '][id]"/>';
            div += '<input type="text" class="form-control" name="options[' + i + '][english_name]" placeholder="Purple" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12">';
            div += '<div class="form-group">';
            div += '<label>Thai Name <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i class="flag-icon flag-icon-th"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="options[' + i + '][thai_name]" placeholder="ม่วง" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-3 col-12">';
            div += '<div class="form-group">';
            div += '<label>Sort Order <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="shuffle"></i></span>';
            div += '</div>';
            div += '<input type="number" class="form-control" name="options[' + i + '][sort_order]" placeholder="0" />';
            div += '</div>';
            div += '</div>';
            div += '</div>';
            div += '<div class="col-md-1 col-12 ">';
            div += '<div class="form-group">';
            div += '<button class="btn btn-outline-danger text-nowrap" type="button" id="btn-delete" data-id="' + i + '">';
            div += '<i data-feather="x"></i>';
            div += '</button>';
            div += '</div>';
            div += '</div>';
            div += '</div>';
            div += '<hr />';
            div += '</div>';

            $('#options').append(div);
            $('#option-' + i).hide().slideDown();
            feather.replace()
        });

        $('.card-body').on('click', '#btn-delete', function() {
            const i = $(this).attr('data-id');

            $('#option-' + i).slideUp('medium', function() {
                $(this).remove();
            });
        });
    })
</script>
@endsection
