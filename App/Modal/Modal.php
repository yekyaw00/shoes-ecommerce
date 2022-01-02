<?php

namespace App;

use Helpers\Inflector;

include_once __DIR__ . "/../Helpers/Inflector.php";

class Modal
{

    static $db, $tb, $columns;

    public function build($table, $fillable)
    {
        $databaseHost = 'localhost';
        $databaseName = 'shoes';
        $databaseUsername = 'root';
        $databasePassword = '';
        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        self::$db = $mysqli;
        self::$tb = $table;
        self::$columns = $fillable;
    }

    public static function all()
    {
        $table = self::$tb;
        $query = mysqli_query(self::$db, "SELECT * from $table");
        $result = $query->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function create($request)
    {
        $request = self::arrageRequestAsFillable($request);
        // return $request;
        $fillable = implode(',', self::$columns);
        $table = self::$tb;
        $query_values = self::arrayToQueryValue($request);
        $result = mysqli_query(self::$db, "INSERT INTO $table ($fillable) VALUES ($query_values)");
        if (!$result) {
            return mysqli_error(self::$db);
        }
        return $result;
    }

    public static function delete($id)
    {
        $table = self::$tb;
        $result = mysqli_query(self::$db, "DELETE from $table WHERE id = $id");
        return $result;
    }

    public static function find($id)
    {
        $table = self::$tb;
        $query = mysqli_query(self::$db, "SELECT * from $table WHERE id = $id");
        $response = $query->fetch_assoc();
        return $response;
    }

    public static function update($id, array $request)
    {
        $table = self::$tb;
        $task = self::find($id);

        foreach ($request as $key => $req) {
            $task[$key] = $req;
        }

        unset($task['id']);

        $edit_columns = self::editColumnsQuery($task);

        $result = mysqli_query(self::$db, "UPDATE $table SET $edit_columns WHERE id = $id");
        return $result;
    }

    public static function arrayToQueryValue($request)
    {

        $string = "";
        $i = 0;

        foreach ($request as $r) {
            $i++;
            $string .= ($i == count($request)) ?  "'" . $r . "'" : "'" . $r . "',";
        }

        return $string;
    }


    public static function editColumnsQuery($request_array)
    {

        $edit_coulmns = "";
        $index = 0;

        foreach ($request_array as $key => $value) {
            global $edit_columns;
            $index++;
            $edit_columns .= ($index == count($request_array)) ? $key . "='" . $value . "'" : $key . "='" . $value . "',";
        }

        return $edit_columns;
    }

    public static function redirect($path)
    {
        header("location:$path");
    }

    public static function arrageRequestAsFillable($request)
    {
        $data = [];
        foreach (self::$columns as $col) {

            $data[$col] = is_numeric($request[$col]) ? (int) $request[$col] : $request[$col];
        }

        return $data;
    }
   /** */
    /*@var array of related tables
    /** */
    public static function with($relationships)
    {
            $primary_data = self::all();
            $foreign_key_arr = [];
            foreach($relationships as $related_table)
            {
                $foreign_key = Inflector::singularize($related_table)."_id";
                array_push($foreign_key_arr,$foreign_key);
                foreach($primary_data as $key => $primary)
                {
                    $related_table_query = mysqli_query(self::$db,"SELECT * FROM $related_table WHERE id = $primary[$foreign_key]");
                    $related_table_data = $related_table_query->fetch_assoc();
                    $primary_data[$key][$related_table] = $related_table_data;
                }
            }

            return $primary_data;

    }

    public static function findWith($id, $relationships)
    {
        $primary_data = self::find($id);
        $foreign_key_arr = [];
        foreach ($relationships as $related_table) {
            $foreign_key = Inflector::singularize($related_table) . "_id";
            array_push($foreign_key_arr, $foreign_key);
            $foreign_data_query = mysqli_query(self::$db, "SELECT * FROM $related_table WHERE id = $primary_data[$foreign_key]");

            $primary_data[$related_table] = $foreign_data_query->fetch_assoc();
        }

        return $primary_data;

        
    }
}
