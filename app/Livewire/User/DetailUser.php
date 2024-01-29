<?php

namespace App\Livewire\User;

use Livewire\Component;

class DetailUser extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.user.detail-user');
    }
}
