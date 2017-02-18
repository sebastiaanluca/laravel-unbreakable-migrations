<?php

namespace SebastiaanLuca\Migrations\Providers;

use Illuminate\Support\ServiceProvider;
use SebastiaanLuca\Migrations\Commands\GenerateMigration;

class UnbreakableMigrationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->commands([
            GenerateMigration::class,
        ]);
    }

    public function provides()
    {
        return [
            GenerateMigration::class,
        ];
    }
}
