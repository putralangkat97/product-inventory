<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        $users = User::query();
        $users = $users->with(['divisions']);
        if ($current_user->hasRole('superadmin')) {
            $users = $users->role(['staff', 'user']);
        } else if ($current_user->hasRole('staff')) {
            $users = $users->role('user');
        }

        return view('user/index', [
            'users' => $users->get(),
        ]);
    }

    public function create()
    {
        return view('user/create', [
            'divisions' => Division::orderBy('name')
                ->get(),
            'roles' => Role::whereNotIn('name', ['superadmin'])
                ->get(),
        ]);
    }

    public function edit(string|int $id)
    {
        $user = User::findOrFail($id);
        $user->load(['divisions', 'roles']);
        return view('user.edit', [
            'user' => $user,
            'divisions' => Division::orderBy('name')
                ->get(),
            'roles' => Role::whereNotIn('name', ['superadmin'])
                ->get(),
        ]);
    }

    public function show(string|int $id)
    {
        $user = User::findOrFail($id);
        $user->load('roles');
        $user_permissions = $user->userPermissions($user->getAllPermissions());
        return view('user/detail', [
            'user' => $user,
            'user_permissions' => $user_permissions,
            'roles' => $user->roles[0],
            'permissions' => Permission::all(),
        ]);
    }
}
