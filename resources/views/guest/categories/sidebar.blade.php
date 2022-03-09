@section('content-sidebar')
<div class="sidebar-shop">
    <div class="row">
        <div class="col-sm-12">
            <h6 class="filter-heading d-none d-lg-block">{{ __('category.filters') }}</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($category->children->count() > 0)
            <div class="multi-range-price">
                <h6 class="filter-title mt-0">{{ __('category.categories') }}</h6>
                <ul class="list-unstyled price-range" id="price-range">
                    @foreach ($category->children as $key => $children)
                    <li>
                        <a href="{{ route('guest.categories.show', ['slug' => $children->locale(session()->get('locale'))->slug]) }}" class="btn btn-block btn-outline-primary">
                            {{ $children->locale(session()->get('locale'))->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- <div class="price-slider">
                <h6 class="filter-title">Price Range</h6>
                <div class="price-slider">
                    <div class="range-slider mt-2" id="price-slider"></div>
                </div>
            </div> --}}

            @foreach ($category->filters as $key => $filter)
            <div class="multi-range-price mt-0">
                <h6 class="filter-title">{{ $filter->locale(session()->get('locale'))->name }}</h6>
                <ul class="list-unstyled price-range" id="price-range">
                    @foreach ($filter->children as $key => $option)
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{ $option->locale(session()->get('locale'))->name }}" data-id="{{ $option->id }}" />
                            <label class="custom-control-label" for="{{ $option->locale(session()->get('locale'))->name }}">
                                {{ $option->locale(session()->get('locale'))->name }}
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
