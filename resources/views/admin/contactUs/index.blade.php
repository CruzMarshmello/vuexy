@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Contact US')

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
                            <th>Comapany</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contactUs->locale('en')->company }}</td>
                            <td>{{ $contactUs->created_at }}</td>
                            <td>{{ $contactUs->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Auth::user()->hasPermission('read contact us'))
                                        <a class="dropdown-item" href="{{ route('admin.contactUs.show', ['id' => $contactUs->id]) }}">
                                            <i data-feather="eye" class="mr-50"></i>
                                            <span>Show</span>
                                        </a>
                                        @endif
                                        @if (Auth::user()->hasPermission('update contact us'))
                                        <a class="dropdown-item" href="{{ route('admin.contactUs.edit', ['id' =>  $contactUs->id]) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
