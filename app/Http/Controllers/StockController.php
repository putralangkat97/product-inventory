<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        $stocks = Stock::with('satuan');
        if ($current_user->hasRole('staff') || $current_user->hasRole('user')) {
            $stocks = $stocks->where('is_private', false);
        }

        return view('stock/index', [
            'stocks' => $stocks->orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('stock/create', [
            'satuans' => Satuan::orderBy('name')
                ->get(),
        ]);
    }

    public function show(Stock $stock)
    {
        $stock = $stock->load('satuan');
        return view('stock/detail', [
            'stock' => $stock,
        ]);
    }

    public function edit(Stock $stock)
    {
        return view('stock/edit', [
            'satuans' => Satuan::orderBy('name')
                ->get(),
            'stock' => $stock,
        ]);
    }
}
