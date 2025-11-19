<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TranslationCms;
use Illuminate\Support\Facades\Schema;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (Schema::hasTable('translation_cms')) {
            $translations = TranslationCms::all()->keyBy('label');
            view()->share('cmsTranslations', $translations);
        }
    }
}
