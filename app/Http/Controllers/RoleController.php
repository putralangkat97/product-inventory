<?php

namespace App\Http\Controllers;

use App\Helpers\FeatureHelper;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('role/index', [
            'roles' => Role::whereNotIn('name', ['superadmin'])->orderBy('name')
                ->get(),
        ]);
    }

    public function create()
    {
        if (!FeatureHelper::isEnabled(FeatureHelper::CUSTOM_USER_ROLE)) {
            return abort(403);
        } else {
            return view('role/create', [
                'permissions' => Permission::all(),
            ]);
        }
    }

    public function show(Role $role)
    {
        return view('role/detail', [
            'role' => $role,
            'role_permissions' => $role->permissions->pluck('name'),
            'permissions' => Permission::all(),
        ]);
    }

    public function edit(Role $role)
    {
        if (!FeatureHelper::isEnabled(FeatureHelper::CUSTOM_USER_ROLE)) {
            return abort(403);
        } else {
            return view('role/edit', [
                'role' => $role,
                'role_permissions' => $role->permissions->pluck('name'),
                'permissions' => Permission::all(),
            ]);
        }
    }
}
