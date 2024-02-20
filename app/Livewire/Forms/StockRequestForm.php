<?php

namespace App\Livewire\Forms;

use App\Models\Stock;
use App\Models\StockRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StockRequestForm extends Form
{
    public $stock_id;
    public $stock_name;
    public $satuan;
    public $qty = 0;
    public $request_date;
    public $remarks;
    public $id;

    public function rules()
    {
        return [
            'qty' => ['required', 'min:0'],
            'request_date' => ['required', 'date'],
            'remarks' => ['nullable'],
        ];
    }

    public function save()
    {
        $this->validate();

        $validated = $this->only([
            'qty',
            'request_date',
            'remarks'
        ]);

        DB::beginTransaction();
        try {
            $last_number = StockRequest::orderBy('id', 'desc')->first()
                ->transaction_code ?? 0;
            $last_increment = substr($last_number, -5);
            $type = '';
            if ($this->id) {
                $stock_request = StockRequest::findOrFail($this->id);
                $current_code = $stock_request->transaction_code;
                $status = $stock_request->status;
                $type = 'edit';
            } else {
                $stock_request = new StockRequest();
                $current_code = config('inventory.transaction_code_prefix') . date('Y') . str_pad($last_increment + 1, 5, 0, STR_PAD_LEFT);
                $status = "pending";
                $type = 'create';
            }
            $stock_request->transaction_code = $current_code;
            $stock_request->stock_id = $this->stock_id;
            $stock_request->satuan = $this->satuan;
            $stock_request->qty = $validated['qty'];
            $stock_request->request_date = $validated['request_date'];
            $stock_request->remarks = $validated['remarks'];
            $stock_request->user_id = Auth::user()->id;
            $stock_request->status = $status;
            $stock_request->save();

            if ($this->stockManagement($type, $stock_request)) {
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function setStockRequest($stock, $stock_request = null)
    {
        if ($stock) {
            $this->stock_id = $stock->id;
            $this->stock_name = $stock->stock_name;
            $this->satuan = $stock->satuan->name;
        }
    }

    private function stockManagement(string $type = null, object|array $stock_request): Bool
    {
        $stock = Stock::findOrFail($this->stock_id);
        if ($type == 'create') {
            $stock->stock_qty = $stock->stock_qty - $stock_request->qty;
            $stock->save();
            return true;
        } else {
            $stock_qty = $stock->stock_qty + $stock_request->qty;
            $stock->stock_qty = $stock_qty;
            $stock->save();

            $stock->stock_qty = $stock->stock_qty - $stock_request->qty;
            $stock->save();

            return true;
        }

        return false;
    }
}
