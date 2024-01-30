<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('stock/index', [
            'stocks' => Stock::orderBy('id', 'desc')
                ->get(),
        ]);
    }
}
