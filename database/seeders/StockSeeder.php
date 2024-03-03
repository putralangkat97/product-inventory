<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $last_number = Stock::orderBy('id', 'desc')->first()
            ->stock_code ?? 0;
        $last_increment = substr($last_number, -5);
        $current_code = config('inventory.stock_code_prefix') . date('Y') . str_pad($last_increment + 1, 5, 0, STR_PAD_LEFT);
        DB::table('stocks')
            ->insert([
                'stock_code' => $current_code,
                'stock_name' => 'Stock 1',
                'stock_qty' => 20,
                'satuan_id' => 1,
                'is_private' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
