<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['name' => 'Division 1', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Division 2', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Division 3', 'created_at' => now(), 'updated_at' => now(),],
        ];
        Division::insert($divisions);
    }
}
