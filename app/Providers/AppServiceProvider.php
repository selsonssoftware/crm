<?php

namespace App\Providers;
use App\Models\general_settings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Get first record and share with all views
    $generalSettings = general_settings::first();

    // If no record exists, create an empty object to avoid errors
    if (!$generalSettings) {
        $generalSettings = new general_settings();
    }

    view()->share('generalSettings', $generalSettings);
    }
}
