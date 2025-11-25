<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'order_number',
        'service_order_id',
    ];

    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class);
    }

    public function metals()
    {
        return $this->hasMany(GjpItemMetal::class);
    }

    public function gemStones()
    {
        return $this->hasMany(GjpItemGemStone::class);
    }
}
