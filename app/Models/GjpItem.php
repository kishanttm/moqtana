<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GjpItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_order_id',
        'jewellery_type_id',
        'total_weight',
        'weight_unit_id',
        'studded_stone_id',
        'article_belonging_file',
        'previous_valuation_report',
        'invoice_file',
        'attachment_file',
        'comment',
    ];

    /**
     * Relationship: GjpItem belongs to a Service Order.
     */
    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class);
    }

    /**
     * Relationship: GjpItem belongs to a Jewelry Type.
     */
    public function jewelryType()
    {
        return $this->belongsTo(JewelryType::class, 'jewellery_type_id');
    }

    /**
     * Relationship: GjpItem has many images.
     */
    public function images()
    {
        return $this->hasMany(GjpItemImage::class);
    }

    public function weightUnit()
    {
        return $this->belongsTo(Unit::class, 'weight_unit_id');
    }

    public function studdedStone()
    {
        return $this->belongsTo(StuddedStone::class, 'studded_stone_id');
    }

    public function gjpItemGemStone()
    {
        return $this->hasMany(GjpItemGemStone::class);
    }

    public function gjpItemMetal()
    {
        return $this->hasMany(GjpItemMetal::class);
    }
}
