<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('stock/index', [
            'stocks' => Stock::with('satuan')->orderBy('id', 'desc')
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
