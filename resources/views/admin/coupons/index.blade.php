@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Coupons')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create coupons'))
<a href="{{ route('admin.coupons.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
    <i data-feather="plus" class="mr-25"></i>
    <span>Create</span>
</a>
@endif
@endsection

@section('content')
@include('admin.panels.message')
<!-- Hoverable rows start -->
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="kb-search-input" action="{{ route('admin.coupons.index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" class="form-control" name="search_name" placeholder="Search Name..." value="{{ old('search_name') }}" />
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date Range</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->start_date }} to {{ $coupon->end_date }}</td>
                            <td>
                                @if ($coupon->status == 'Enabled')
                                <div class="badge badge-light-success">Enabled</div>
                                @else
                                <div class="badge badge-light-secondary">Disabled</div>
                                @endif
                            </td>
                            <td>{{ $coupon->created_at }}</td>
                            <td>{{ $coupon->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read coupons'))
                                        <a class="dropdown-item" href="{{ route('admin.coupons.show', ['id' => $coupon->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update coupons'))
                                        <a class="dropdown-item" href="{{ route('admin.coupons.edit', ['id' => $coupon->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete coupons'))
                                        <form action="{{ route('admin.coupons.destroy', ['id' => $coupon->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="dropdown-item" style="width:100%">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $coupons->appends(['search_name' => old('search_name')])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
