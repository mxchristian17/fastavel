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

    static function hasOne(string  $parentTable, int $parentTableId, string $childrenTable): ?array
    {

        global $mysqli;
        global $debMode;

            if ( !self::tableExists($parentTable) ) die ($debMode ? "Table ".$parentTable." does not exists on database." : "");
            if ( !self::tableExists($childrenTable) ) die ($debMode ? "Table ".$childrenTable." does not exists on database." : "");

            $result = $mysqli->query("SELECT * FROM $parentTable AS A LEFT JOIN $childrenTable AS B ON A.ID = B.UserId WHERE A.ID = $parentTableId LIMIT 1");
            if($result->num_rows === 1) return $result->fetch_array();
            
            return null;

    }

    private static function tableExists(string $table): bool
    {

        global $mysqli;

        $tableCheck = $mysqli->query("SHOW TABLES LIKE '$table'");
        if($tableCheck->num_rows === 0) return false;
        return true;
    }

}