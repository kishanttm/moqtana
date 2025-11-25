<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurposeOfValuation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name'];

    public function serviceOrder()
    {
        return $this->hasMany(ServiceOrder::class, 'purpose_id');
    }
}
