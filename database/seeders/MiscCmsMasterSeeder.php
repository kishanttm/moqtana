<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiscCmsMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Purpose Of Valuation default values
        DB::table('purpose_of_valuations')->insert([
            ['name' => 'Insurance'],
            ['name' => 'Loan'],
            ['name' => 'Wealth Assessment'],
            ['name' => 'Resale Value'],
        ]);

        // Studded Stone default values
        DB::table('studded_stones')->insert([
            ['name' => 'Diamond'],
            ['name' => 'Ruby'],
            ['name' => 'Emerald'],
            ['name' => 'Sapphire'],
        ]);

        // Unit default values
        DB::table('units')->insert([
            ['name' => 'Gram'],
            ['name' => 'Carat'],
            ['name' => 'Piece'],
            ['name' => 'Kg'],
        ]);
    }
}
