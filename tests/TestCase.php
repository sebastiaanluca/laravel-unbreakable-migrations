<?php

namespace SebastiaanLuca\Migrations\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use SebastiaanLuca\Migrations\Providers\UnbreakableMigrationsServiceProvider;

class TestCase extends BaseTestCase
{
    /**
     * @param $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app) : void
    {
        $app->setBasePath(__DIR__ . '/files');
    }

    /**
     * @param $app
     *
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [
            UnbreakableMigrationsServiceProvider::class,
        ];
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown() : void
    {
        parent::tearDown();

        $tempDir = __DIR__ . '/files';

        system('/bin/rm -rf ' . escapeshellarg($tempDir));
    }
}
