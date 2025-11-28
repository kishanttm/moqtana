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

    public function allArticlesAdded(): bool
    {
        if (!$this->serviceOrder) {
            return false;
        }

        // Total articles in service order
        $totalArticles = $this->serviceOrder->articles->count();

        if ($totalArticles === 0) {
            return false;
        }

        // How many articles exist in test as metals or gemstones
        $addedArticleIds = collect()
            ->merge($this->metals->pluck('gjp_item_id'))
            ->merge($this->gemStones->pluck('gjp_item_id'))
            ->unique()
            ->filter()
            ->count();

        return $addedArticleIds === $totalArticles;
    }

}
