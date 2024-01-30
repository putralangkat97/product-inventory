<?php

namespace App\Livewire\Satuan;

use Livewire\Component;

class IndexSatuan extends Component
{
    public $satuans;

    public function render()
    {
        return view('livewire.satuan.index-satuan');
    }
}
