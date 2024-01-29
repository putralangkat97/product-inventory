<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuans = [
            ['name' => 'Kg'],
            ['name' => 'Pcs'],
            ['name' => 'Bungkus'],
            ['name' => 'Unit'],
        ];

        foreach ($satuans as $satuan) {
            Satuan::create($satuan);
        }
    }
}
