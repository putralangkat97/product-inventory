<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class FormUser extends Component
{
    public $roles;
    public $divisions;
    public $user;

    public UserForm $form;

    public function mount()
    {
        if ($this->user) {
            $this->form->setUser($this->user);
        }
    }

    public function save()
    {
        $message = 'created';
        if ($this->user) {
            $message = 'updated';
        }

        $this->form->save();
        session()->flash("success", "User {$message} successfully");

        return $this->redirectRoute('user.index');
    }

    public function render()
    {
        return view('livewire.user.form-user');
    }
}
