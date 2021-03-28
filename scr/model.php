<?php

namespace EduardoLanzini;

use EduardoLanzini\DB;

Class Model
{
    public function getTable()
    {
        return static::$table;
    }

    public function getPrimaryKey()
    {
        return static::$primaryKey;
    }

    public static function get($id)
    {
        return DB::table(static::$table.(static::$alias ? ' as '.static::$alias : '') )
        ->where((static::$alias ? static::$alias.'.' : '').static::$primaryKey, $id)
        ->get();
    }

    public static function find($value,$column=null)
    {
        $v = isset($column) ? $column : $value;
        $c = isset($column) ? $value  : static::$primaryKey;

        return DB::table(static::$table.(static::$alias ? ' as '.static::$alias : '') )
        ->find($c,$v);
    }

    public static function select()
    {
        return DB::table(static::$table.(static::$alias ? ' as '.static::$alias : '') );
    }

    public static function all()
    {
        return DB::table(static::$table)->all();
    }

    public static function create($fields)
    {
        return DB::table(static::$table)->insert($fields);
    }

    public static function update($id, $fields)
    {
        return DB::table(static::$table)->where(static::$primaryKey, $id)->update($fields);
    }

    public static function delete($id)
    {
        return DB::table(static::$table)->where(static::$primaryKey, $id)->delete();
    }
}
