<?php

namespace App\Livewire\StockRequest;

use App\Enum\Status;
use App\Models\StockRequest;
use Livewire\Component;

class IndexStockRequest extends Component
{
    public $stock_requests;
    public $history = false;

    public function accept(StockRequest $stock_request)
    {
        $stock_request->update([
            'status' => Status::ACCEPTED
        ]);
        session()->flash("success", "Stock Accepted successfully");

        return $this->redirectRoute('stock-request.index');
    }

    public function reject(StockRequest $stock_request)
    {
        $stock_request->update([
            'status' => Status::REJECTED
        ]);
        session()->flash("success", "Stock Rejected successfully");

        return $this->redirectRoute('stock-request.index');
    }

    public function render()
    {
        return view('livewire.stock-request.index-stock-request');
    }
}
