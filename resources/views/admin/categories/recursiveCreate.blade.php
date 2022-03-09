@foreach ($children as $key => $category)
<option value="{{ $category->id }}" {{ (old('category') == $category->id)? 'selected' : '' }}>
    {{ $parent }} » {{ $category->locale('en')->name }}
</option>
@if ($category->children->count() > 0)
@include('admin.categories.recursiveCreate',['parent' => $parent.' » '.$category->locale('en')->name, 'children' => $category->children])
@endif
@endforeach
