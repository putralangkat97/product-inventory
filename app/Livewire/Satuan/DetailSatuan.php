<?php

namespace App\Livewire\Satuan;

use Livewire\Component;

class DetailSatuan extends Component
{
    public $satuan;

    public function render()
    {
        return view('livewire.satuan.detail-satuan');
    }
}
