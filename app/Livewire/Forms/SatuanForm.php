<?php

namespace App\Livewire\Forms;

use App\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SatuanForm extends Form
{
    public $name;
    public $id;

    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:100', Rule::unique(Satuan::class)->ignore($this->id)],
        ];
    }

    public function save()
    {
        $this->validate();

        $validated = $this->only(['name']);

        DB::beginTransaction();
        try {
            if ($this->id) {
                $satuan = Satuan::findOrFail($this->id);
            } else {
                $satuan = new Satuan();
            }
            $satuan->name = $validated['name'];
            $satuan->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function setSatuan($satuan)
    {
        if ($satuan) {
            $this->id = $satuan->id;
            $this->name = $satuan->name;
        }
    }
}
