<?php

namespace SebastiaanLuca\Migrations;

use Illuminate\Database\Migrations\MigrationCreator;

class ExtendedMigrationCreator extends MigrationCreator
{
    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return __DIR__ . '/../stubs';
    }
}
