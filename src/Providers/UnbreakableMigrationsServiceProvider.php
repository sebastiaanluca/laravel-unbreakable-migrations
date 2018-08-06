<?php

namespace SebastiaanLuca\Migrations\Providers;

use Illuminate\Support\ServiceProvider;
use SebastiaanLuca\Migrations\Commands\GenerateMigration;

class UnbreakableMigrationsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->commands([
            GenerateMigration::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() : array
    {
        return [
            GenerateMigration::class,
        ];
    }
}
