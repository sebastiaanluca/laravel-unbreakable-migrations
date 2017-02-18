<?php

namespace SebastiaanLuca\Migrations\Tests\Commands;

use SebastiaanLuca\Migrations\Tests\TestCase;

class GenerateMigrationTest extends TestCase
{
    public function testItGeneratesACreateTableMigration()
    {
        $path = __DIR__ . '/../../files/database/migrations';

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $this->artisan('generate:migration', [
            'name' => 'create_notifications_table',
            '--create' => 'notifications',
        ]);

        collect(glob($path . '/*create_notifications_table*'))->each(function (string $file) {
            $file = file_get_contents($file);

            $this->assertContains('class CreateNotificationsTable', $file);
            $this->assertContains("create('notifications'", $file);
            $this->assertContains("drop('notifications'", $file);
        });
    }

    public function testItGeneratesAMigrationInAModule()
    {
        $path = __DIR__ . '/../../files/modules/MyModule/database/migrations';

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $this->artisan('generate:migration', [
            'name' => 'create_notifications_table',
            '--create' => 'notifications',
            '--module' => 'MyModule',
        ]);

        collect(glob($path . '/*create_notifications_table*'))->each(function (string $file) {
            $file = file_get_contents($file);

            $this->assertContains('class CreateNotificationsTable', $file);
            $this->assertContains("create('notifications'", $file);
            $this->assertContains("drop('notifications'", $file);
        });
    }
}
