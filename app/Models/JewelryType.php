<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JewelryType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function gjpItems()
    {
        return $this->hasMany(GjpItem::class, 'jewellery_type_id');
    }
}
