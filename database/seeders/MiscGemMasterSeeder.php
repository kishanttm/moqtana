<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Shape,
    CutGrade,
    Color,
    Clarity,
    Group,
    Transparency,
    Luster,
    Species,
    Variety,
    Fluorescence,
    Phenomena,
    Estimated,
    Identification
};

class MiscGemMasterSeeder extends Seeder
{
    public function run(): void
    {
        // SHAPES
        $shapes = [
            'Round','Oval','Pear','Princess',
            'Cushion','Marquise','Emerald',
            'Heart','Asscher','Radiant'
        ];

        foreach ($shapes as $name) {
            Shape::firstOrCreate(['name' => $name]);
        }


        // CUT GRADES
        $cutGrades = ['Excellent','Very Good','Good','Fair','Poor'];
        foreach ($cutGrades as $name) {
            CutGrade::firstOrCreate(['name' => $name]);
        }


        // COLORS
        $colors = ['D','E','F','G','H','I','J','K','L','M'];
        foreach ($colors as $name) {
            Color::firstOrCreate(['name' => $name]);
        }


        // CLARITIES
        $clarities = ['FL','IF','VVS1','VVS2','VS1','VS2','SI1','SI2','I1'];
        foreach ($clarities as $name) {
            Clarity::firstOrCreate(['name' => $name]);
        }


        // GROUPS
        $groups = ['A','B','C','D','E'];
        foreach ($groups as $name) {
            Group::firstOrCreate(['name' => $name]);
        }


        // TRANSPARENCY
        $transparency = ['Transparent','Semi-Transparent','Opaque'];
        foreach ($transparency as $name) {
            Transparency::firstOrCreate(['name' => $name]);
        }


        // LUSTER
        $lusters = ['Vitreous','Metallic','Pearly','Silky','Dull'];
        foreach ($lusters as $name) {
            Luster::firstOrCreate(['name' => $name]);
        }


        // SPECIES
        $species = ['Quartz','Beryl','Corundum','Feldspar','Spinel'];
        foreach ($species as $name) {
            Species::firstOrCreate(['name' => $name]);
        }


        // VARIETY
        $varieties = ['Ruby','Sapphire','Emerald','Amethyst','Topaz'];
        foreach ($varieties as $name) {
            Variety::firstOrCreate(['name' => $name]);
        }


        // FLUORESCENCE
        $fluorescence = ['None','Faint','Medium','Strong','Very Strong'];
        foreach ($fluorescence as $name) {
            Fluorescence::firstOrCreate(['name' => $name]);
        }


        // PHENOMENA
        $phenomena = [
            'Asterism',
            'Chatoyancy',
            'Color Change',
            'Adularescence'
        ];
        foreach ($phenomena as $name) {
            Phenomena::firstOrCreate(['name' => $name]);
        }


        // ESTIMATED
        $estimated = ['Low','Medium','High','Very High'];
        foreach ($estimated as $name) {
            Estimated::firstOrCreate(['name' => $name]);
        }


        // IDENTIFICATION
        $identifications = ['Natural','Synthetic','Treated','Imitation'];
        foreach ($identifications as $name) {
            Identification::firstOrCreate(['name' => $name]);
        }
    }
}
