<?php


namespace Core;


abstract class Model
{
    protected $fillables = [];
    protected $table;

    public static function create(array $arr)
    {   
        // Позднее статическое связывание создаём объект класса
        $currentModel = new static;
        DB::table($currentModel->table)->insert([
            $arr
        ]);
    }

    public function get()
    {

    }

    public function first()
    {

    }

    public static function all()
    {

    }
}