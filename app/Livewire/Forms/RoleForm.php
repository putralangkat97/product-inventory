<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public $id;
    public $name;
    public array $permission;

    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:100', Rule::unique(Role::class)->ignore($this->id)]
        ];
    }

    public function save()
    {
        $this->validate();

        $validated = $this->only(['name']);
        DB::beginTransaction();
        try {
            if ($this->id) {
                $role = Role::findOrFail($this->id);
            } else {
                $role = new Role();
            }
            $role->name = strtolower($validated['name']);
            $role->save();

            $add = [];
            foreach ($this->permission as $index => $permission) {
                if ($permission) {
                    $add[] = $index;
                }
            }

            if ($this->id) {
                $role->syncPermissions($add);
            } else {
                $role->givePermissionTo($add);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function setRole($role, $role_permissions)
    {
        if ($role) {
            $this->name = $role->name;
            $this->id = $role->id;

            foreach ($role_permissions as $role_permission) {
                $this->permission[$role_permission] = true;
            }
        }
    }
}
