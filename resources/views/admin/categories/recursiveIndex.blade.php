@foreach ($children as $key => $category)
<tr>
    <td>{{ $parent }} » {{ $category->locale('en')->name }}</td>
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
@include('admin.categories.recursiveIndex',['parent' => $parent.' » '.$category->locale('en')->name, 'children' => $category->children])
@endif
@endforeach
