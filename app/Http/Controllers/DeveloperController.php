<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeveloperController
{
    public function index()
    {
        Gate::authorize('viewDev', User::class);
        
        return view('developer.index');
    }
}
