<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use App\Models\Province;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewMemberController
{
    public function __invoke(Request $request): View
    {
        $provinces = Province::query()->pluck('name', 'id');
        $expertises = Expertise::query()->pluck('name', 'id');
        $query = User::query()
            ->with([
                'province',
                'firstExpertise',
                'secondExpertise',
            ]);

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($province = $request->get('province')) {
            $query->whereHas('province', function ($query) use ($province) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereKey($province);
            });
        }

        if ($expertise = $request->get('expertise')) {
            $query->where(function ($query) use ($expertise) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereHas('firstExpertise', function ($query) use ($expertise) {
                        /** @var \Illuminate\Database\Eloquent\Builder $query */
                        $query->whereKey($expertise);
                    })
                    ->orWhereHas('secondExpertise', function ($query) use ($expertise) {
                        /** @var \Illuminate\Database\Eloquent\Builder $query */
                        $query->whereKey($expertise);
                    });
            });
        }

        $users = $query->paginate(8)
            ->appends('search', $request->query('search'))
            ->appends('province', $request->query('province'))
            ->appends('expertise', $request->query('expertise'));

        return view('member.index', compact('expertises', 'provinces', 'users'));
    }
}
