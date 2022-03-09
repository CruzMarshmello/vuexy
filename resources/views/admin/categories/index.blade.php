@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Categories')

@section('breadcrumb-button')
@if (Auth::user()->hasPermission('create categories'))
<a href="{{ route('admin.categories.create') }}" class="btn btn-primary waves-effect waves-float waves-light btn-block">
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
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $category->locale('en')->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read categories'))
                                        <a class="dropdown-item" href="{{ route('admin.categories.show', ['id' => $category->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update categories'))
                                        <a class="dropdown-item" href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete categories'))
                                        <form action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="post">
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
                        @if ($category->children->count() > 0)
                        @include('admin.categories.recursiveIndex',['parent' => $category->locale('en')->name, 'children' => $category->children])
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
