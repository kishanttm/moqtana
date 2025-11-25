<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GjpItemMetal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gjp_item_id',
        'test_id',
        'precious_metal_type_id',
        'precious_color_id',
        'stamp_id',
        'purity',
        'metal_net_weight',
    ];

    public function gjpItem()
    {
        return $this->belongsTo(GjpItem::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function preciousMetalType()
    {
        return $this->belongsTo(PreciousMetalType::class);
    }

    public function preciousColor()
    {
        return $this->belongsTo(PreciousColor::class);
    }

    public function stamp()
    {
        return $this->belongsTo(Stamp::class);
    }
}
