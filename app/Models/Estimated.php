<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estimated extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function GjpItemGemStone()
    {
        return $this->hasMany(GjpItemGemStone::class, 'estimated_id');
    }
}
