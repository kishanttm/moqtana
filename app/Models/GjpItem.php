<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GjpItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_order_id',
        'jewellery_type_id',
        'total_weight',
        'weight_unit',
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
     * Relationship: GjpItem belongs to a Studded Stone type.
     */
    public function studdedStone()
    {
        return $this->belongsTo(StuddedStone::class);
    }

    /**
     * Relationship: GjpItem has many images.
     */
    public function images()
    {
        return $this->hasMany(GjpItemImage::class);
    }
}
