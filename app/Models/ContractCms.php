<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractCms extends Model
{
    use HasFactory;

    protected $table = 'contract_cms';

    protected $fillable = [
        'contract_en',
        'contract_ar',
    ];
}

