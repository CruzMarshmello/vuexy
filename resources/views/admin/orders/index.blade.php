@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Orders')

@section('content')
@include('admin.panels.message')
<!-- Hoverable rows start -->
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="kb-search-input" action="{{ route('admin.orders.index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" class="form-control" name="search_code" placeholder="Search Code..." value="{{ old('code') }}" />
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Parcel</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="user-name text-truncate mb-0 ml-50">#{{ $order->code }}</h6>
                                        <small class="text-truncate text-muted ml-50">
                                            @if ($order->user_id == '')
                                            {{ $order->email }}
                                            @else
                                            <span class="text-primary">{{ $order->email }}</span>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($order->parcel == '')
                                <span class="text-warning">Waiting</span>
                                @else
                                {{ $order->parcel }}
                                @endif
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read orders'))
                                        <a class="dropdown-item" href="{{ route('admin.orders.show', ['id' => $order->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update orders'))
                                        <a class="dropdown-item" href="{{ route('admin.orders.edit', ['id' => $order->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete orders'))
                                        <form action="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" method="post">
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
                {{ $orders->appends(['search_code' => old('search_code')])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
