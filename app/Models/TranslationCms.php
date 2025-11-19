<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationCms extends Model
{
    use HasFactory;

    protected $table = 'translation_cms';

    protected $fillable = [
        'label',
        'name_en',
        'name_ar',
    ];

    /**
     * Auto-select correct language based on app locale.
     *
     * Example: $item->name => returns English or Arabic automatically
     */
    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }
}
