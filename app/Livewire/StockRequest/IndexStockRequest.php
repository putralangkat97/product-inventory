<?php

namespace App\Livewire\StockRequest;

use Livewire\Component;

class IndexStockRequest extends Component
{
    public $stock_requests;

    public function render()
    {
        return view('livewire.stock-request.index-stock-request');
    }
}
