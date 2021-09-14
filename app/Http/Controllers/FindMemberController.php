<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class FindMemberController
{
    public function __invoke(): View
    {
        return view('member.index');
    }
}
