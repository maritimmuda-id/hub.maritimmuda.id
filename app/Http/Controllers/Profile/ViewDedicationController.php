<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewDedicationController
{
    public function __invoke(): View
    {
        return view('profile.dedication.list');
    }
}
