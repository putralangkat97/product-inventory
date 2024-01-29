<?php

namespace App\Livewire\Role;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class FormRole extends Component
{
    public $role;
    public $permissions;
    public $role_permissions;
    public array $permission;

    public RoleForm $form;

    public function mount()
    {
        if ($this->role) {
            $this->form->setRole($this->role, $this->role_permissions);
        }
    }

    public function save()
    {
        $message = 'created';
        if ($this->role) {
            $message = 'updated';
        }

        $this->form->save();
        session()->flash("success", "Role {$message} successfully");

        return $this->redirectRoute('role.index');
    }

    public function render()
    {
        return view('livewire.role.form-role');
    }
}
