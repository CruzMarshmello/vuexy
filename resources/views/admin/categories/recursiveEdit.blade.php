@foreach ($children as $key => $array)
<option value="{{ $array->id }}" {{ (old('category', $category->parent_id) == $array->id)? 'selected' : '' }} {{ ($category->id == $array->id)? 'disabled' : '' }}>
    {{ $parent }} » {{ $array->locale('en')->name }}
</option>

@if ($array->children->count() > 0)
@include('admin.categories.recursiveEdit',['parent' => $parent.' » '.$array->locale('en')->name, 'children' => $array->children])
@endif
@endforeach
