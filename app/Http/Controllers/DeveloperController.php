<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DeveloperController
{
    public function index()
    {
        Gate::authorize('viewDev', User::class);
        $developers = Developer::all(); 

        return view('developer.index', compact('developers'));
    }
}
