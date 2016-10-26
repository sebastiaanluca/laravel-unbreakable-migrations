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
     * Database manager
     *
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $manager;
    
    /**
     * Database connection
     *
     * @var \Illuminate\Database\Connection
     */
    protected $database;
    
    /**
     * Database schema manager
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;
    
    /**
     * List of all tables related to this migration
     *
     * You can add them here and use the dropAll() method in down().
     *
     * Why? Because it's easier and safer, because dropAll() will check
     * if the table exists before trying to delete it.
     *
     * @var array
     */
    protected $tables = [];
    
    /**
     * The Laravel migrator up() method.
     */
    public function up()
    {
        $this->connect();
        $this->migrateUp();
    }
    
    /**
     * The Laravel migrator down() method.
     */
    public function down()
    {
        $this->connect();
        $this->migrateDown();
    }
    
    /**
     * Check if this is a Laravel application
     */
    protected function isLaravel()
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
    protected function tableExists($table)
    {
        return $this->schema->hasTable($table);
    }
    
    /**
     * Check the database connection and use of the Laravel framework.
     *
     * @throws \Exception
     */
    protected function connect()
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
     */
    protected function handleException($exception)
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
     * @param $tableName
     * @param $column
     */
    protected function dropColumn($tableName, $column)
    {
        // Check for its existence before dropping
        if (! $this->schema->hasColumn($tableName, $column)) {
            return;
        }
        
        $this->schema->table($tableName, function(Blueprint $table) use ($column) {
            $table->dropColumn($column);
        });
    }
    
    /**
     * Safely drop a table.
     *
     * @param string $tables
     * @param bool $ignoreKeyConstraints
     */
    protected function drop($tables, $ignoreKeyConstraints = false)
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
     */
    protected function dropAllTables($ignoreKeyConstraints = false)
    {
        $this->drop($this->tables, $ignoreKeyConstraints);
    }
    
    /**
     * The abstracted up() method.
     *
     * Do not use up(), use this one instead.
     */
    abstract protected function migrateUp();
    
    /**
     * The abstracted down() method.
     *
     * Do not use down(), use this one instead.
     */
    abstract protected function migrateDown();
}