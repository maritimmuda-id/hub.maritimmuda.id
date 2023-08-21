<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class UserNotification extends Component
{
    protected ?User $user = null;

    public bool $asDropdownView = true;

    public function boot(Request $request): void
    {
        $this->user = $request->user();
    }

    public function mount(bool $asDropdownView = true): void
    {
        $this->asDropdownView = $asDropdownView;
    }

    public function render(): View
    {
        $unreadNotificationsCount = $this->user?->notifications()->unread()->count();

        if ($this->asDropdownView) {
            $notifications = $this->user?->notifications()
                ->unread()
                ->paginate(6);

            return view('notification.dropdown', compact('unreadNotificationsCount', 'notifications'));
        }
    }

    public function markAsRead(?string $id): void
    {
        $this->notification($id)?->markAsRead();
    }

    public function markAsUnread(?string $id): void
    {
        $this->notification($id)?->markAsUnread();
    }

    private function notification(?string $notificationId): ?DatabaseNotification
    {
        return $this->user?->notifications()?->find($notificationId);
    }
}
