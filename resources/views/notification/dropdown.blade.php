<li class="c-header-nav-item dropdown mx-1" wire:poll.30s>
    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="c-icon fas fa-bell"></i>
        @if ($unreadNotificationsCount > 0)
            <span class="badge badge-pill badge-primary">
                {{ $unreadNotificationsCount }}
            </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right pt-0">
        <div class="dropdown-header bg-light py-2">
            <strong>@lang('notification.heading')</strong>
        </div>
        @forelse ($notifications as $item)
            <a
                href="{{ $item->data['action'] ?? '#' }}"
                target="{{ $item->data['target'] ?? '_self' }}"
                class="dropdown-item d-flex justify-content-between"
                wire:click="markAsRead('{{ $item->id }}')"
            >
                <div>
                    <strong class="d-block">{{ $item->data['title'] ?? '' }}</strong>
                    <span>{{ \Illuminate\Support\Str::limit($item->data['message'] ?? '', 25) }}</span>
                </div>
            </a>
        @empty
            <div class="dropdown-item disabled">
                @lang('notification.no-notifications-text')
            </div>
        @endforelse
        {{-- @if ($notifications?->hasMorePages())
            <a href="#" class="dropdown-item">
                @lang('notification.view-all-notification-text')
            </a>
        @endif --}}
    </div>
</li>
