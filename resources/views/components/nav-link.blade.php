@props([
    'href' => '#',
    'active' => false,
    'icon' => '',
    'label' => '',
])

<a href="{{ $href }}" class="c-sidebar-nav-link {{ $active ? 'c-active' : '' }}">
    <i class="c-sidebar-nav-icon fa-fw {{ $icon }}"></i>
    {!! $label !!}
</a>

