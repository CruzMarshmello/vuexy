@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Customer Create')

@section('content')
@include('admin.panels.message')
@include('admin.panels.error')
<div class="row">
    <div class="col-md-12 col-12">
        <form class="form form-vertical" action="{{ route('admin.customers.store') }}" method="post">
            @csrf
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
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('full_name')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="user"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('full_name')
                                                is-invalid
                                            @enderror
                                            " name="full_name" placeholder="John Doe" value="{{ old('full_name') }}" />
                                        </div>
                                        @error ('full_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('email')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control
                                            @error ('email')
                                                is-invalid
                                            @enderror
                                            " name="email" placeholder="john@example.com" value="{{ old('email') }}" />
                                        </div>
                                        @error ('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('password')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control
                                            @error ('password')
                                                is-invalid
                                            @enderror
                                            " name="password" placeholder="John5266325@" />
                                        </div>
                                        @error ('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password Confirmation <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge
                                        @error ('password_confirmation')
                                            is-invalid
                                        @enderror
                                        ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control
                                            @error ('password_confirmation')
                                                is-invalid
                                            @enderror
                                            " name="password_confirmation" placeholder="John5266325@" />
                                        </div>
                                        @error ('password_confirmation')
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
                                            <option value="Active" {{ (old('status') == 'Active')? 'selected' : '' }}>Active</option>
                                            <option value="Blocked" {{ (old('status') == 'Blocked')? 'selected' : '' }}>Blocked</option>
                                            <option value="Deactivated" {{ (old('status') == 'Deactivated')? 'selected' : '' }}>Deactivated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- data tab -->
                        <div class="tab-pane" id="address-book" role="tabpanel" aria-labelledby="address-book-tab" aria-expanded="false">
                            <div class="clearfix">
                                <button class="btn btn-outline-info text-nowrap float-right" type="button" id="btn-address-book-plus">
                                    <i data-feather="plus"></i>
                                </button>
                            </div>

                            @if (old('address_books'))
                            @foreach (old('address_books') as $key => $address_book)
                            <div id="address-book-{{ $key }}">
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Location <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.location')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.location')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][location]" placeholder="My Home" value="{{ old('address_books')[$key]['location'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.full_name')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.full_name')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][full_name]" placeholder="John Doe" value="{{ old('address_books')[$key]['full_name'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.full_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Address 1 <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.address_1')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.address_1')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][address_1]" placeholder="123 Phiboonsongkharm Rd." value="{{ old('address_books')[$key]['address_1'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.address_1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="address_books[{{ $key }}][address_2]" placeholder="Optional" value="{{ old('address_books')[$key]['address_2'] }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Sub District <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.sub_district')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.sub_district')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][sub_district]" placeholder="Bangkharn" value="{{ old('address_books')[$key]['sub_district'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.sub_district')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>District <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.district')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.district')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][district]" placeholder="Mueng" value="{{ old('address_books')[$key]['district'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.district')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Province <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.province')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.province')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][province]" placeholder="Nonthaburi" value="{{ old('address_books')[$key]['province'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.province')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Postal Code <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.postal_code')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                                                </div>
                                                <input type="number" class="form-control
                                                @error ('address_books.'.$key.'.postal_code')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][postal_code]" placeholder="11000" value="{{ old('address_books')[$key]['postal_code'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.postal_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Country <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.country')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="flag"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.country')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][country]" placeholder="Thailand" value="{{ old('address_books')[$key]['country'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 align-self-start">
                                        <div class="form-group">
                                            <label>Telephone <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge
                                            @error('address_books.'.$key.'.telephone')
                                                is-invalid
                                            @enderror
                                            ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control
                                                @error ('address_books.'.$key.'.telephone')
                                                    is-invalid
                                                @enderror
                                                " name="address_books[{{ $key }}][telephone]" placeholder="012-345-6789" value="{{ old('address_books')[$key]['telephone'] }}" />
                                            </div>
                                            @error ('address_books.'.$key.'.telephone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-12 align-self-center">
                                        <div class="form-group">
                                            <button class="btn btn-outline-danger text-nowrap" type="button" id="btn-address-book-delete" data-id="{{ $key }}">
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
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex flex-sm-row flex-column">
                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
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
<script type="text/javascript">
    $(function() {
        $('#address-book').on('click', '#btn-address-book-plus', function() {
            const i = parseInt($('button[id = btn-address-book-delete]').last().attr('data-id')) + 1 | 0;

            let div = '<div id="address-book-' + i + '">';
            div += '<div class="row d-flex align-items-end">';
            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Location <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="map-pin"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][location]" placeholder="My Home"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Full Name <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="user"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][full_name]" placeholder="John Doe"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Address 1 <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][address_1]" placeholder="123 Phiboonsongkharm Rd."/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Address 2</label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][address_2]" placeholder="Optional"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Sub District <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][sub_district]" placeholder="Bangkharn"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>District <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][district]" placeholder="Mueng"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Province <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][province]" placeholder="Nonthaburi"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Postal Code <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="file-text"></i></span>';
            div += '</div>';
            div += '<input type="number" class="form-control" name="address_books[' + i + '][postal_code]" placeholder="11000"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Country <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="flag"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][country]" placeholder="Thailand"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-4 col-12 align-self-start">';
            div += '<div class="form-group">';
            div += '<label>Telephone <span class="text-danger">*</span></label>';
            div += '<div class="input-group input-group-merge">';
            div += '<div class="input-group-prepend">';
            div += '<span class="input-group-text"><i data-feather="phone"></i></span>';
            div += '</div>';
            div += '<input type="text" class="form-control" name="address_books[' + i + '][telephone]" placeholder="012-345-6789"/>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            div += '<div class="col-md-1 col-12 align-self-center">';
            div += '<div class="form-group">';
            div += '<button class="btn btn-outline-danger text-nowrap" type="button" id="btn-address-book-delete" data-id="' + i + '">';
            div += '<i data-feather="x"></i>';
            div += '</button>';
            div += '</div>';
            div += '</div>';
            div += '</div>';
            div += '<hr />';
            div += '</div>';

            $('#address-book').append(div);
            $('#address-book-' + i).hide().slideDown();
            feather.replace();
        });

        $('#address-book').on('click', '#btn-address-book-delete', function() {
            const i = $(this).attr('data-id');

            $('#address-book-' + i).slideUp('medium', function() {
                $(this).remove();
            });
        });
    });
</script>
@endsection
