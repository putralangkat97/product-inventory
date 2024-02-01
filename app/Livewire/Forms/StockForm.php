<?php

namespace App\Livewire\Forms;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StockForm extends Form
{
    public $id;
    public $stock_code;
    public $stock_name;
    public $stock_qty = 0;
    public $satuan_id;
    public $is_private;

    public function rules()
    {
        return [
            'stock_code' => [Rule::unique(Stock::class)->ignore($this->id)],
            'stock_name' => ['required', 'min:2', 'max:100'],
            'stock_qty' => ['required', 'numeric', 'min:0'],
            'satuan_id' => ['required'],
            'is_private' => ['nullable'],
        ];
    }

    public function save()
    {
        $this->validate();

        $validated = $this->only([
            'stock_name',
            'stock_qty',
            'satuan_id'
        ]);

        DB::beginTransaction();
        try {
            $last_number = Stock::orderBy('id', 'desc')->first()
                ->stock_code ?? 0;
            $last_increment = substr($last_number, -5);
            if ($this->id) {
                $stock = Stock::findOrFail($this->id);
                $current_code = $stock->stock_code;
            } else {
                $stock = new Stock();
                $current_code = config('inventory.stock_code_prefix') . date('Y') . str_pad($last_increment + 1, 5, 0, STR_PAD_LEFT);
            }
            $stock->stock_code = $current_code;
            $stock->stock_name = $validated['stock_name'];
            $stock->stock_qty = $validated['stock_qty'];
            $stock->satuan_id = $validated['satuan_id'];
            $stock->is_private = $this->is_private ? true : false;
            $stock->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function setStock($stock)
    {
        if ($stock) {
            $this->id = $stock->id;
            $this->stock_code = $stock->stock_code;
            $this->stock_name = $stock->stock_name;
            $this->stock_qty = $stock->stock_qty;
            $this->satuan_id = $stock->satuan_id;
            $this->is_private = $stock->is_private;
        }
    }
}
