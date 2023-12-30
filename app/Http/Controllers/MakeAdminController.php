<?php

namespace App\Http\Controllers;

use App\Models\User;

class MakeAdminController
{
    public function make(User $user)
    {
        $user->update(['is_admin' => 1]);
        return redirect()->route('user.index');
    }

    public function delete(User $user)
    {
        $user->update(['is_admin' => 0]);
        return redirect()->route('user.index');
    }
}
