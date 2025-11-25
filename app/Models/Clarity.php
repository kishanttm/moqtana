<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clarity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function GjpItemGemStone()
    {
        return $this->hasMany(GjpItemGemStone::class, 'clarity_id');
    }
}
