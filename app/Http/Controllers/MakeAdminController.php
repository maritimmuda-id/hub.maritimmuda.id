<?php

namespace App\Http\Controllers;

use App\Models\User;

class MakeAdminController
{
    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => 1]);
        return redirect()->route('user.index');
    }

    public function deleteAdmin(User $user)
    {
        $user->update(['is_admin' => 0]);
        return redirect()->route('user.index');
    }

    public function makeDeveloper(User $user)
    {
        $user->update(['is_admin' => 2]);
        return redirect()->route('user.index');
    }

    public function deleteDeveloper(User $user)
    {
        $user->update(['is_admin' => 0]);
        return redirect()->route('user.index');
    }
}
