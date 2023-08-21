<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewWorkExperienceController
{
    public function __invoke(): View
    {
        return view('profile.work-experience.list');
    }
}
