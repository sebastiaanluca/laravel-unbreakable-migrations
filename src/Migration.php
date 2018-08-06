<?php

namespace SebastiaanLuca\Migrations;

use Exception;
use Illuminate\Database\Migrations\Migration as IlluminateMigration;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;

abstract class Migration extends IlluminateMigration
{
    /**
     * The database manager.
     *
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $manager;

    /**
     * The database connection.
     *
     * @var \Illuminate\Database\Connection
     */
    protected $database;

    /**
     * The database schema manager.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * List of all tables related to this migration.
     *
     * Enables you to use the dropAll() method when reversing migrations.
     *
     * @var array
     */
    protected $tables = [];

    /**
     * The Laravel migrator up() method.
     *
     * @return void
     */
    public function up() : void
    {
        $this->connect();
        $this->migrateUp();
    }

    /**
     * The Laravel migrator down() method.
     *
     * @return void
     */
    public function down() : void
    {
        $this->connect();
        $this->migrateDown();
    }

    /**
     * Check if this is a Laravel application
     *
     * @return bool
     */
    protected function isLaravel() : bool
    {
        return function_exists('app') && app() instanceof Application;
    }

    /**
     * Check if a table exists.
     *
     * @param string $table
     *
     * @return mixed
     */
    protected function tableExists(string $table)
    {
        return $this->schema->hasTable($table);
    }

    /**
     * Check the database connection and use of the Laravel framework.
     *
     * @return void
     * @throws \Exception
     */
    protected function connect() : void
    {
        if (! $this->isLaravel()) {
            throw new Exception('This migrator must be ran from inside a Laravel application.');
        }

        $this->manager = app('db');
        $this->database = $this->manager->connection();
        $this->schema = $this->database->getSchemaBuilder();
    }

    /**
     * Handle an exception.
     *
     * @param \Exception $exception
     *
     * @return void
     */
    protected function handleException($exception) : void
    {
        $previous = $exception->getPrevious();

        if ($exception instanceof QueryException) {
            throw new $exception($exception->getMessage(), $exception->getBindings(), $previous);
        }

        throw new $exception($exception->getMessage(), $previous);
    }

    /**
     * Safely drop a column from a table.
     *
     * @param string $tableName
     * @param string $column
     *
     * @return void
     */
    protected function dropColumn(string $tableName, string $column) : void
    {
        // Check for its existence before dropping
        if (! $this->schema->hasColumn($tableName, $column)) {
            return;
        }

        $this->schema->table($tableName, function (Blueprint $table) use ($column) {
            $table->dropColumn($column);
        });
    }

    /**
     * Safely drop a table.
     *
     * @param array|string $tables
     * @param bool $ignoreKeyConstraints
     *
     * @return void
     */
    protected function drop($tables, bool $ignoreKeyConstraints = false) : void
    {
        if ($ignoreKeyConstraints) {
            $this->database->statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (! is_array($tables)) {
            $tables = [$tables];
        }

        foreach ($tables as $table) {
            if ($this->tableExists($table)) {
                $this->schema->drop($table);
            }
        }

        if ($ignoreKeyConstraints) {
            $this->database->statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }

    /**
     * Safely drop all tables.
     *
     * @param bool $ignoreKeyConstraints
     *
     * @return void
     */
    protected function dropAllTables(bool $ignoreKeyConstraints = false) : void
    {
        $this->drop($this->tables, $ignoreKeyConstraints);
    }

    /**
     * Execute the migration.
     *
     * @return void
     */
    abstract protected function migrateUp() : void;

    /**
     * Reverse the migration.
     *
     * @return void
     */
    abstract protected function migrateDown() : void;
}
