<?php

namespace App\Livewire\Stock;

use Livewire\Component;

class IndexStock extends Component
{
    public $stocks;

    public function render()
    {
        return view('livewire.stock.index-stock');
    }
}
