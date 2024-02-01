<?php

namespace App\Livewire\Stock;

use Livewire\Component;

class DetailStock extends Component
{
    public $stock;

    public function render()
    {
        return view('livewire.stock.detail-stock');
    }
}
