<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class DetailRole extends Component
{
    public $role;

    public function render()
    {
        return view('livewire.role.detail-role');
    }
}
