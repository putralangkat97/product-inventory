<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        return view('satuan/index', [
            'satuans' => Satuan::orderBy('id', 'desc')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('satuan/create');
    }

    public function show(Satuan $satuan)
    {
        return view('satuan/detail', [
            'satuan' => $satuan
        ]);
    }

    public function edit(Satuan $satuan)
    {
        return view('satuan/edit', [
            'satuan' => $satuan
        ]);
    }
}
