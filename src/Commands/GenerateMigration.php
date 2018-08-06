<?php

namespace SebastiaanLuca\Migrations\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Support\Composer;
use SebastiaanLuca\Migrations\ExtendedMigrationCreator;

class GenerateMigration extends MigrateMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:migration
                            {name : The name of the migration}
                            {--create= : The table to be created}
                            {--table= : The table to migrate}
                            {--path= : The location where the migration file should be created}
                            {--module= : The table to migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an unbreakable migration class that uses transactional queries.';

    /**
     * Create a new migration install command instance.
     *
     * @param \SebastiaanLuca\Migrations\ExtendedMigrationCreator $creator
     * @param \Illuminate\Support\Composer $composer
     */
    public function __construct(ExtendedMigrationCreator $creator, Composer $composer)
    {
        parent::__construct($creator, $composer);
    }

    /**
     * Execute the console command.
     */
    public function fire()
    {
        if ($module = $this->option('module')) {
            $this->input->setOption('path', 'modules/' . $module . '/database/migrations');
        }

        parent::fire();
    }
}
