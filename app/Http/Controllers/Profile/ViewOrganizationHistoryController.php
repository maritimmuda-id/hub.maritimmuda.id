<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewOrganizationHistoryController
{
    public function __invoke(): View
    {
        return view('profile.organization-history.list');
    }
}
