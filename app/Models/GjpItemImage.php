<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GjpItemImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gjp_item_id',
        'image_path',
        'name',
        'for_testing',
        'for_valuation_report',
    ];

    /**
     * Relationship: Image belongs to a GjpItem.
     */
    public function gjpItem()
    {
        return $this->belongsTo(GjpItem::class);
    }

    /**
     * Accessor for full image URL (optional if using storage symlink).
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
