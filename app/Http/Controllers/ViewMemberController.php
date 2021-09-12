<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query;
use Illuminate\Http\Request;

class ViewMemberController
{
    public function __invoke(Request $request): View
    {
        $query = User::query()
            ->with('province', function (Query\Builder | BelongsTo $query) {
                $query->select('id', 'name');
            });

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $users = $query->paginate(8);

        return view('member.index', compact('users'));
    }
}
