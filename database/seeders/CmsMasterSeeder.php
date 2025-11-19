<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PreciousMetalType;
use App\Models\PreciousColor;
use App\Models\Stamp;
use App\Models\PcStatus;
use App\Models\JewelryType;
use App\Models\Comment;

class CmsMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 🪙 Precious Metal Types
        PreciousMetalType::insert([
            ['name' => 'Gold'],
            ['name' => 'Silver'],
            ['name' => 'Platinum'],
            ['name' => 'Palladium'],
        ]);

        // 🎨 Precious Colors
        PreciousColor::insert([
            ['name' => 'Yellow'],
            ['name' => 'White'],
            ['name' => 'Rose'],
            ['name' => 'Green'],
        ]);

        // 🔖 Stamps
        Stamp::insert([
            ['name' => '18K'],
            ['name' => '22K'],
            ['name' => '24K'],
            ['name' => '925'],
        ]);

        // ⚙️ PC Statuses
        PcStatus::insert([
            ['name' => 'Available'],
            ['name' => 'Sold'],
            ['name' => 'Under Maintenance'],
        ]);

        // 💍 Jewelry Types
        JewelryType::insert([
            ['name' => 'Ring'],
            ['name' => 'Necklace'],
            ['name' => 'Bracelet'],
            ['name' => 'Earring'],
        ]);

        // 💬 Comments
        Comment::insert([
            ['name' => 'Excellent craftsmanship'],
            ['name' => 'Needs polishing'],
            ['name' => 'Custom order pending'],
        ]);
    }
}
