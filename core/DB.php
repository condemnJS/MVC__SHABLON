<?php


namespace Core;


final class DB
{
    private $connect;
    protected $request;

    public $table;

    public function __construct() // Подключение к БД
    {
        // Подключаем конфиги
        require_once APP_DIR . "/configs.php";
        ['host' => $host, 'db' => $db, 'user' => $user, 'password' => $password] = $configs;

        try {
            $this->connect = new \PDO("mysql:host={$host};dbname={$db};charset=UTF8", $user, $password);
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
        $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Установка исключения об ошибках
    }

    private function prepare($sql)
    {
        $this->request = $this->connect->prepare($sql);
        return $this;
    }

    private function execute()
    {
        return $this->request->execute();
    }

    public static function table(string $table) 
    {
        $object = new self;
        $object->table = $table;
        return $object;
    }

    public function insert(array $arr) 
    {
        foreach ($arr as $value) {
            $keys = implode(',', array_map(fn($el) => $el, array_keys($value)));
            $values = implode(',', array_map(fn($el) => "('$el')", array_values($value)));
            if(is_array($value)) {
                $this->prepare("INSERT INTO $this->table ($keys) VALUES ($values)")->execute();
            }
        }
    }
}