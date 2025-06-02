<?php

namespace mpba\DB2\Database\Schema;

use Closure;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Builder
 */
class Builder extends \Illuminate\Database\Schema\Builder
{
    /**
     * Determine if the given table exists.
     *
     * @param  string  $table
     */
    public function hasTable($table): bool
    {
        $sql = $this->grammar->compileTableExists();
        $schemaTable = explode('.', $table);

        if (count($schemaTable) > 1) {
            $schema = $schemaTable[0];
            $table = $this->connection->getTablePrefix().$schemaTable[1];
        } else {
            $schema = $this->connection->getDefaultSchema();
            $table = $this->connection->getTablePrefix().$table;
        }

        return count($this->connection->select($sql, [
            $schema,
            $table,
        ])) > 0;
    }

    /**
     * Determine of a column exists
     */
    public function hasColumn($table, $column): bool
    {
        return in_array(
            strtolower($column),
            array_map('strtolower', $this->getColumnListing($table)),
            true
        );
    }

    /**
     * Get the column listing for a given table.
     *
     * @param  string  $table
     */
    public function getColumnListing($table): array
    {
        $sql = $this->grammar->compileColumnExists();
        $database = $this->connection->getDatabaseName();
        $table = $this->connection->getTablePrefix().$table;

        $tableExploded = explode('.', $table);

        if (count($tableExploded) > 1) {
            $database = $tableExploded[0];
            $table = $tableExploded[1];
        }

        $results = $this->connection->select($sql, [
            $database,
            $table,
        ]);

        $res = $this->connection->getPostProcessor()
            ->processColumnListing($results);

        return array_values(array_map(function ($r) {
            return $r->COLUMN_NAME;
        }, $res));
    }

    /**
     * Execute the blueprint to build / modify the table.
     */
    protected function build(Blueprint $blueprint): void
    {
        $schemaTable = explode('.', $blueprint->getTable());

        if (count($schemaTable) > 1) {
            $this->connection->setCurrentSchema($schemaTable[0]);
        }

        $blueprint->build($this->connection, $this->grammar);
        $this->connection->resetCurrentSchema();
    }

    /**
     * Create a new command set with a Closure.
     *
     * @return Blueprint
     */
    protected function createBlueprint($table, ?Closure $callback = null)
    {
        if (isset($this->resolver)) {
            return call_user_func($this->resolver, $table, $callback);
        }

        return new \mpba\DB2\Database\Schema\Blueprint($table, $callback);
    }

    public function dropAllTables(): void
    {
        $tables = [];

        foreach ($this->getAllTables() as $row) {
            $row = (array) $row;

            $tables[] = reset($row);
        }

        if (empty($tables)) {
            return;
        }

        $this->disableForeignKeyConstraints();

        $this->connection->statement(
            $this->grammar->compileDropAllTables($tables)
        );

        $this->enableForeignKeyConstraints();
    }

    public function getAllTables()
    {
        $tables = $this->connection->select($this->grammar->compileGetAllTables());

        return array_column($tables, 'name');
    }

    public function getColumnType($table, $column, $fullDefinition = false)
    {
        $table = $this->connection->getTablePrefix().$table;

        $record = $this->connection->select(
            str_replace('{DB_NAME}', $this->connection->getDatabaseName(), $this->grammar->compileGetColumnType()),
            [$table, $column]
        );
        $record = reset($record);

        if (! $record) {
            return null;
        }

        $record->numeric_precision = (int) $record->numeric_precision;
        $record->numeric_scale = (int) $record->numeric_scale;

        return $record;
    }
}
