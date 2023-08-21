<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewEducationHistoryController
{
    public function __invoke(): View
    {
        return view('profile.education-history.list');
    }
}
