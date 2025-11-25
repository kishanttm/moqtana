<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Luster extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function GjpItemGemStone()
    {
        return $this->hasMany(GjpItemGemStone::class, 'luster_id');
    }
}
