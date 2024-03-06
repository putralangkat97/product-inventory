<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create(Stock $stock)
    {
        $stock = $stock->load('satuan');
        return view('stock-request/create', [
            'stock' => $stock,
        ]);
    }

    public function history()
    {
        $stock_request_histories = StockRequest::with(['user', 'stock']);
        $current_user = Auth::user();
        if ($current_user->hasRole('user')) {
            $stock_request_histories = $stock_request_histories
                ->where('user_id', $current_user->id);
        }
        return view('stock-request/history', [
            'stock_request_histories' => $stock_request_histories
                ->get(),
        ]);
    }

    public function edit(Stock $stock, StockRequest $stock_request)
    {
        return view('stock-request/edit', [
            'stock' => $stock,
            'stock_request' => $stock_request
        ]);
    }

    public function show(Stock $stock, StockRequest $stock_request)
    {
        return view('stock-request/detail', [
            'stock' => $stock,
            'stock_request' => $stock_request
        ]);
    }
}
