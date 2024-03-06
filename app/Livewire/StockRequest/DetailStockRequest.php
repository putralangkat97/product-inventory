<?php

namespace App\Livewire\StockRequest;

use Livewire\Component;

class DetailStockRequest extends Component
{
    public $stock;
    public $stock_request;

    public function render()
    {
        return view('livewire.stock-request.detail-stock-request');
    }
}
