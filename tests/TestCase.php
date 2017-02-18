<?php

namespace SebastiaanLuca\Migrations\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use SebastiaanLuca\Migrations\Providers\UnbreakableMigrationServiceProvider;

class TestCase extends BaseTestCase
{
    /**
     * @param $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->setBasePath(__DIR__ . '/files');
    }

    /**
     * @param $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            UnbreakableMigrationServiceProvider::class,
        ];
    }

    /**
     * Clean up the testing environment before the next test.
     */
    protected function tearDown()
    {
        parent::tearDown();

        $tempDir = __DIR__ . '/files';

        system('/bin/rm -rf ' . escapeshellarg($tempDir));
    }
}
