<?php

declare(strict_types=1);

namespace Models\DbQuery;

class DbQuery
{

    static function first(string  $table, string $condition): ?array
    {

        global $mysqli;
        global $debMode;

            if ( !self::tableExists($table) ) die ($debMode ? "Table ".$table." does not exists on database." : "");

            $result = $mysqli->query("SELECT * FROM $table WHERE $condition LIMIT 1");
            if($result->num_rows === 1) return $result->fetch_array();
            
            return null;

    }

    static function firstId(string  $table, string $condition): ?int
    {

        global $mysqli;
        global $debMode;

            if ( !self::tableExists($table) ) die ($debMode ? "Table ".$table." does not exists on database." : "");

            $result = $mysqli->query("SELECT Id FROM $table WHERE $condition LIMIT 1");
            if($result->num_rows === 1) return intval($result->fetch_array()[0]);
            
            return null;

    }

    static function joinOne(?string  $parentTable, ?int $parentTableId, ?string $childrenTable): ?array
    {

        global $mysqli;
        global $debMode;

            if ( $parentTableId === null ) die ($debMode ? "Not valid Id on ".$parentTable : "");
            if ( !self::tableExists($parentTable) ) die ($debMode ? "Table ".$parentTable." does not exists on database." : "");
            if ( !self::tableExists($childrenTable) ) die ($debMode ? "Table ".$childrenTable." does not exists on database." : "");

            $result = $mysqli->query("SELECT * FROM $parentTable AS A LEFT JOIN $childrenTable AS B ON A.ID = B.UserId WHERE A.ID = $parentTableId LIMIT 1");
            if($result->num_rows === 1) return $result->fetch_array();
            
            return null;

    }

    static function insert(string $table, array $values): ?array
    {

        global $mysqli;
        global $debMode;

        if (!self::tableExists($table)) {
            die($debMode ? "Table " . $table . " does not exist in database." : "");
        }

        $placeholders = rtrim(str_repeat('?,', count($values)), ',');
        $types = str_repeat('s', count($values));
        $stmt = $mysqli->prepare("INSERT INTO $table VALUES ($placeholders)");
        $stmt->bind_param($types, ...$values);
        $result = $stmt->execute();

        if ($result) {
            $id = $mysqli->insert_id;
            return $mysqli->query("SELECT * FROM $table WHERE id = $id")->fetch_array();
        } else {
            return null;
        }

    }

    /**
     * Update a row in the specified table with the given data.
     * 
     * @param string $table The name of the table being updated.
     * @param array $updateData An associative array of column names and their corresponding new values.
     * @param int $id The unique identifier of the row being updated.
     * @return array|null The updated row as an array, or null if the update was unsuccessful.
     */
    static function update(string $table, array $updateData, int $id): ?array
    {
        global $mysqli;
        global $debMode;

        if (!self::tableExists($table)) {
            die($debMode ? "Table " . $table . " does not exist in database." : "");
        }

        // Build the SET clause of the UPDATE statement and the parameter types and values for the prepared statement
        $set_values = '';
        $param_types = '';
        $param_values = [];

        foreach ($updateData as $column => $value) {
            $set_values .= "$column = ?, ";
            $param_types .= 's';
            $param_values[] = $value;
        }

        $set_values = rtrim($set_values, ', ');

        // Prepare and execute the UPDATE statement
        $stmt = $mysqli->prepare("UPDATE $table SET $set_values WHERE id = ?");
        $param_types .= 'i';
        $param_values[] = $id;

        $stmt->bind_param($param_types, ...$param_values);
        $result = $stmt->execute();

        // Fetch the updated row and return it as an array, or return null if the update was unsuccessful
        if ($result) {
            return $mysqli->query("SELECT * FROM $table WHERE id = $id")->fetch_array();
        } else {
            return null;
        }
        
    }

    private static function tableExists(string $table): bool
    {

        global $mysqli;

        $tableCheck = $mysqli->query("SHOW TABLES LIKE '$table'");
        if($tableCheck->num_rows === 0) return false;
        return true;
    }

}