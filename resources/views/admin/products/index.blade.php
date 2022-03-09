@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Products')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create products'))
<a href="{{ route('admin.products.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
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
                <form class="kb-search-input" action="{{ route('admin.products.index') }}" method="get">
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
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        @if ($product->productImages->count() > 0)
                                        @foreach ($product->productImages as $key => $productImage)
                                        @if ($key == 0)
                                        <div class="avatar mr-50"><img src="{{ $productImage->path }}" style="height:40px; width:40px;"></div>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="user-name text-truncate mb-0 ml-50">{{ $product->locale('en')->name }}</h6>
                                        <small class="text-truncate text-muted ml-50">
                                            @if ($product->children->count() > 0)
                                            @foreach ($product->children as $key => $option)
                                            @if ($option->quantity > 0)
                                            <div class="badge badge-light-success">
                                                {{ $option->locale('en')->name }} :{{ $option->quantity }}
                                            </div>
                                            @else
                                            <div class="badge badge-light-danger">
                                                {{ $option->locale('en')->name }} : OOS
                                            </div>
                                            @endif
                                            @endforeach
                                            @else
                                            @if ($product->quantity > 0)
                                            <div class="badge badge-light-success">
                                                {{ $product->quantity }}
                                            </div>
                                            @else
                                            <div class="badge badge-light-danger">
                                                OOS
                                            </div>
                                            @endif
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($product->status === 'Enabled')
                                <div class="badge badge-light-success">{{ $product->status }}</div>
                                @else
                                <div class="badge badge-light-secondary">{{ $product->status }}</div>
                                @endif
                            </td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read products'))
                                        <a class="dropdown-item" href="{{ route('admin.products.show', ['id' => $product->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update products'))
                                        <a class="dropdown-item" href="{{ route('admin.products.edit', ['id' => $product->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete products'))
                                        <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="post">
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
                {{ $products->appends(['search_name' => old('search_name')])->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Hoverable rows end -->
@endsection
