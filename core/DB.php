<?php


namespace Core;


final class DB
{
    private $connect;
    protected $request;

    public function __construct(array $config) // Подключение к БД
    {
        $host = $config['host'] || '';
        $user = $config['user'] || '';
        $password = $config['password'] || '';
        $table = $config['table'] || '';

        try {
            $this->connect = new \PDO("mysql:host={$host};dbname={$table}", $user, $password);
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
        $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Установка исключения об ошибках
    }

    public function prepare($sql)
    {
        $this->request = $this->connect->prepare($sql);
        return $this;
    }

    public function execute()
    {
        return $this->request->execute();
    }
}