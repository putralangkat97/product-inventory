<?php

namespace App\Livewire\User;

use Livewire\Component;

class PermissionUser extends Component
{
    public $permissions;
    public $user_permissions;
    public $user;
    public $role;

    public array $permission;

    public function mount()
    {
        if ($this->user) {
            $this->role = $this->user->roles[0];
        }

        foreach ($this->user_permissions as $user) {
            $this->permission[$user] = true;
        }
    }

    public function save()
    {
        $add = [];
        foreach ($this->permission as $index => $permission) {
            if ($permission) {
                $add[] = $index;
            }
        }

        $this->role->syncPermissions($add);
        session()->flash('success', 'Permission updated successfully');
        return $this->redirectRoute('user.show', ['id' => $this->user->id]);
    }

    public function render()
    {
        return view('livewire.user.permission-user');
    }
}
