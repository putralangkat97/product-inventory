<?php

namespace App\Http\Controllers;

use App\Models\StockRequest;
use Illuminate\Http\Request;

class StockRequestController extends Controller
{
    public function index()
    {
        return view('stock-request/index', [
            'stock_requests' => StockRequest::with(['stock', 'user'])
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }
}
