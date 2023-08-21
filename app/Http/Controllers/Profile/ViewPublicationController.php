<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;

class ViewPublicationController
{
    public function __invoke(): View
    {
        return view('profile.publication.list');
    }
}
