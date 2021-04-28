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

    static public function find($id) 
    {
        $currentModel = new static;
        return DB::table($currentModel->table)->where('id', $id)->first();
    }

    public static function all()
    {
        $currentModel = new static;
        return DB::table($currentModel->table)->all();
    }

    static public function delete($model) {
        $currentModel = new static;
        DB::table($currentModel->table)->where('id', $model['id'])->delete();
    }

    static public function update($model, $requests) {
        $currentModel = new static;
        DB::table($currentModel->table)->update($model, $requests);
    }

}