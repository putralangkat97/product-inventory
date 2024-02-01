<?php

namespace App\Livewire\Stock;

use App\Livewire\Forms\StockForm;
use Livewire\Component;

class FormStock extends Component
{
    public $stock;
    public $satuans;
    public StockForm $form;

    public function mount()
    {
        if ($this->stock) {
            $this->form->setStock($this->stock);
        }
    }

    public function save()
    {
        $message = 'created';
        if ($this->stock) {
            $message = 'updated';
        }

        $this->form->save();
        session()->flash("success", "Stock {$message} successfully");

        return $this->redirectRoute('stock.index');
    }

    public function render()
    {
        return view('livewire.stock.form-stock');
    }
}
