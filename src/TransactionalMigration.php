<?php

namespace SebastiaanLuca\Migrations;

use Exception;

abstract class TransactionalMigration extends Migration
{
    /**
     * The Laravel migrator up() method.
     */
    public function up()
    {
        $this->connect();
        $this->executeInTransaction('migrateUp');
    }

    /**
     * The Laravel migrator down() method.
     */
    public function down()
    {
        $this->connect();
        $this->executeInTransaction('migrateDown');
    }

    /**
     * Execute the migration command inside a transaction layer.
     *
     * @param string $method
     */
    protected function executeInTransaction(string $method)
    {
        try {
            $this->database->beginTransaction();

            $this->{$method}();

            $this->database->commit();
        } catch (Exception $exception) {
            $this->database->rollback();

            $this->handleException($exception);
        }
    }
}