<?php

namespace App\Livewire\StockRequest;

use App\Livewire\Forms\StockRequestForm;
use Livewire\Component;

class FormStockRequest extends Component
{
    public $stock;
    public $stock_request;
    public int $stock_left;

    public StockRequestForm $form;

    public function mount()
    {
        if ($this->stock) {
            $this->form->setStockRequest($this->stock, $this->stock_request);
            $this->stock_left = $this->stock->stock_qty - $this->form->qty;
        }
    }

    public function dec()
    {
        $this->form->qty--;
        $this->stock_left++;
    }

    public function inc()
    {
        $this->form->qty++;
        $this->stock_left--;
    }

    public function save()
    {
        $message = 'created';
        if ($this->stock) {
            $message = 'updated';
        }

        $this->form->save();
        session()->flash("success", "Request {$message} successfully");

        return $this->redirectRoute('stock.index');
    }

    public function render()
    {
        return view('livewire.stock-request.form-stock-request');
    }
}
