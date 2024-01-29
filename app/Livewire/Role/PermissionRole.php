<?php

namespace App\Livewire\Role;

use Livewire\Component;

class PermissionRole extends Component
{
    public $role;
    public $permissions;
    public $role_permissions;
    public $disabled;

    public array $permission;

    public function mount()
    {
        if ($this->role) {
            $this->disabled = true;
            foreach ($this->role_permissions as $role) {
                $this->permission[$role] = true;
            }
        }
    }
    public function render()
    {
        return view('livewire.role.permission-role');
    }
}
