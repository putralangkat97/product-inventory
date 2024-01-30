<?php

namespace App\Livewire\Satuan;

use App\Livewire\Forms\SatuanForm;
use Livewire\Component;

class FormSatuan extends Component
{
    public $satuan;

    public SatuanForm $form;

    public function mount()
    {
        if ($this->satuan) {
            $this->form->setSatuan($this->satuan);
        }
    }

    public function save()
    {
        $message = 'created';
        if ($this->satuan) {
            $message = 'updated';
        }

        $this->form->save();
        session()->flash("success", "Unit {$message} successfully");

        return $this->redirectRoute('satuan.index');
    }

    public function render()
    {
        return view('livewire.satuan.form-satuan');
    }
}
