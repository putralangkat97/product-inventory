<?php

namespace App\Helpers;

use Spatie\Permission\Models\Role;

class RoleAndPermissionManager
{
    public function assignePermission(string $role_name): bool
    {
        $role = Role::where('name', $role_name)->first();
        if ($role) {
            $this->givePermission($role, $role_name);
            return true;
        }

        return false;
    }

    private function givePermission(object $role, string $role_name): void
    {
        if ($role_name == 'superadmin') {
            $role->givePermissionTo('create user');
            $role->givePermissionTo('edit user');
            $role->givePermissionTo('delete user');
            $role->givePermissionTo('view user');
            $role->givePermissionTo('create stock');
            $role->givePermissionTo('edit stock');
            $role->givePermissionTo('delete stock');
            $role->givePermissionTo('view stock');
            $role->givePermissionTo('accept stock request');
            $role->givePermissionTo('reject stock request');
            $role->givePermissionTo('view stock report');
            $role->givePermissionTo('export stock report');
            $role->givePermissionTo('create satuan');
            $role->givePermissionTo('edit satuan');
            $role->givePermissionTo('delete satuan');
            $role->givePermissionTo('view satuan');
        } else if ($role_name == 'staff') {
            $role->givePermissionTo('view user');
            $role->givePermissionTo('view stock');
            $role->givePermissionTo('view satuan');
            $role->givePermissionTo('view stock report');
            $role->givePermissionTo('export stock report');
            $role->givePermissionTo('accept stock request');
            $role->givePermissionTo('reject stock request');
        } else {
            $role->givePermissionTo('view stock');
            $role->givePermissionTo('create stock request');
            $role->givePermissionTo('edit stock request');
            $role->givePermissionTo('delete stock request');
            $role->givePermissionTo('view stock request');
        }
    }
}
