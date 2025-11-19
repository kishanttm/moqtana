<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContractCms;

class ContractCmsSeeder extends Seeder
{
    public function run(): void
    {
        ContractCms::create([
            'contract_en' => 'Full height editor..',
            'contract_ar' => 'محرر كامل الارتفاع ..',
        ]);
    }
}

