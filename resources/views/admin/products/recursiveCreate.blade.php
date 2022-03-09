@foreach ($children as $key => $category)
<option value="{{ $category->id }}" @if (old('categories'))
{{ in_array($category->id, old('categories'))? 'selected' : '' }}
@endif
>
{{ $parent }} » {{ $category->locale('en')->name }}
</option>
@if ($category->children->count() > 0)
@include('admin.products.recursiveCreate', ['parent' => $parent.' » '.$category->locale('en')->name, 'children' => $category->children])
@endif
@endforeach
