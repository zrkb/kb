<?php

namespace Pandorga\KB;

use Illuminate\Support\ServiceProvider;

class KBServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }

        // Helpers
        $this->registerHelpers();
    }

    public function publishResources()
    {
        if (! class_exists('CreateKBTables')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/../database/migrations/create_kb_tables.php' => database_path("/migrations/{$timestamp}_create_kb_tables.php"),
            ], 'kb-migrations');

            $this->publishes([
                __DIR__ . '/../resources/stubs/models' => app_path("/Models"),
            ], 'kb-models');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerThirdPartyVendors();
    }

    public function registerThirdPartyVendors()
    {
        // Service Providers
        // $this->app->register(\Third\Party\ThirdPartyServiceProvider::class);

        // Facades
        // AliasLoader::getInstance(['Facade' => \Third\Party\Facade::class]);
    }

    public function registerHelpers()
    {
        foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }
    }
}
