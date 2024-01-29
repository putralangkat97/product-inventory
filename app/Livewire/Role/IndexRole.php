<?php

namespace App\Livewire\Role;

use Livewire\Component;

class IndexRole extends Component
{
    public $roles;

    public function render()
    {
        return view('livewire.role.index-role');
    }
}
