<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GjpItemGemStone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gjp_item_id',
        'test_id',
        'stone_type',
        'number_of_stones',
        'weight_per_stone',
        'total_weight',
        'measurement',
        'plotting',
        'shape_id',
        'cut_grade_id',
        'color_id',
        'clarity_id',
        'group_id',
        'transparency_id',
        'luster_id',
        'species_id',
        'variety_id',
        'fluorescence_id',
        'phenomena_id',
        'estimated_id',
        'identification_id',
        'comment_id',
        'weight_stone_unit_id',
        'total_weight_unit_id',
        'internal_comment'
    ];

    public function gjpItem()
    {
        return $this->belongsTo(GjpItem::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function cutGrade()
    {
        return $this->belongsTo(CutGrade::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function clarity()
    {
        return $this->belongsTo(Clarity::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function transparency()
    {
        return $this->belongsTo(Transparency::class);
    }

    public function luster()
    {
        return $this->belongsTo(Luster::class);
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }

    public function fluorescence()
    {
        return $this->belongsTo(Fluorescence::class);
    }

    public function phenomena()
    {
        return $this->belongsTo(Phenomena::class);
    }

    public function estimated()
    {
        return $this->belongsTo(Estimated::class);
    }

    public function identification()
    {
        return $this->belongsTo(Identification::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function weightStoneUnit()
    {
        return $this->belongsTo(Unit::class, 'weight_stone_unit_id');
    }

    // Total weight unit
    public function totalWeightUnit()
    {
        return $this->belongsTo(Unit::class, 'total_weight_unit_id');
    }
}
