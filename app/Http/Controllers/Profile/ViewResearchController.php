<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewResearchController
{
    public function __invoke(): View
    {
        return view('profile.research.list');
    }
}
