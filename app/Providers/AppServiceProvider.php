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
        // Get the first general settings record
        $generalSettings = general_settings::first();

        // Share it with all views
        view()->share('generalSettings', $generalSettings);
    }
}
