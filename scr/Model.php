<?php

namespace EduardoLanzini;

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

    public static function all()
    {
    	return DB::table(static::$table)->all();
    }

    protected static function create($fields)
    {
    	return DB::table(static::$table)->insert($fields);
    }

    protected static function update($id, $fields)
    {
    	return DB::table(static::$table)->where(static::$primaryKey, $id)->update($fields);
    }

    protected static function delete($id)
    {
    	return DB::table(static::$table)->where(static::$primaryKey, $id)->delete();
    }
}
