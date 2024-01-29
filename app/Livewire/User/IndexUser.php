<?php

namespace App\Livewire\User;

use Livewire\Component;

class IndexUser extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.user.index-user');
    }
}
