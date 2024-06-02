<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Master\MCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasterCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Dataran',
            'Dinding'
        ];
        foreach ($data as $d) {
            MCategory::create([
                'name' => $d,
                'slug' => Str::slug($d)
            ]);
        }
    }
}
