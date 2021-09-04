<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewAchievementHistoryController
{
    public function __invoke(): View
    {
        return view('profile.achievement-history.list');
    }
}
