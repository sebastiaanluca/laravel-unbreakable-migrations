<?php

namespace SebastiaanLuca\Migrations;

use Exception;

abstract class TransactionalMigration extends Migration
{
    /**
     * The Laravel migrator up() method.
     *
     * @return void
     */
    public function up() : void
    {
        $this->connect();
        $this->executeInTransaction('migrateUp');
    }

    /**
     * The Laravel migrator down() method.
     *
     * @return void
     */
    public function down() : void
    {
        $this->connect();
        $this->executeInTransaction('migrateDown');
    }

    /**
     * Execute the migration command inside a transaction layer.
     *
     * @param string $method
     *
     * @return void
     */
    protected function executeInTransaction(string $method) : void
    {
        try {
            $this->database->beginTransaction();

            $this->{$method}();

            $this->database->commit();
        } catch (Exception $exception) {
            $this->database->rollBack();

            $this->handleException($exception);
        }
    }
}
