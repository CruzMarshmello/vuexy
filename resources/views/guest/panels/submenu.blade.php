@if ($depth <= 2)
    <ul class="menu-content">
    @foreach ($children as $category)
    <li class="nav-item">
        <a href="{{ route('guest.categories.show', ['slug' => $category->locale(session()->get('locale'))->slug]) }}" class="d-flex align-items-center">
            <i data-feather="circle"></i>
            <span class="menu-item text-truncate" id="nav-text" data-slug="{{ $category->locale(session()->get('locale'))->slug }}">
                {{ $category->locale(session()->get('locale'))->name }}
            </span>
        </a>

        @if ($category->children->count() > 0)
        @include('guest.panels.submenu', ['children' => $category->children, 'depth' => $depth+1])
        @endif
    </li>
    @endforeach
    </ul>
@endif
