<?php


namespace Core;


final class DB
{
    private $connect;
    protected $request;
    private $conditions;

    public $table;

    public function __construct() // Подключение к БД
    {
        // Подключаем конфиги
        require APP_DIR . "/configs.php";
        ['host' => $host, 'db' => $db, 'user' => $user, 'password' => $password] = $configs;
        try {
            $this->connect = new \PDO("mysql:host={$host};dbname={$db};charset=UTF8", $user, $password);
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
        $this->request->execute();
        return $this->request;
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

    public function all() 
    {
        return $this->query("SELECT * FROM $this->table")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function query(string $sql) {
        return $this->connect->query($sql);
    }

    public function where($condition, $value) {
        $this->conditions[$this->table][] = [$condition => $value];
        return $this;
    }

    private function generateRequest() {
        $cond = "";
        $counter = 0;
        foreach ($this->conditions[$this->table] as $stek) {
            foreach ($stek as $key => $value) {
                $cond .= "$key = '$value'";
                $counter++;
                if($counter !== count($this->conditions[$this->table])) {
                    $cond .= " AND ";
                }
            }
        }
        return $this->prepare("SELECT * FROM $this->table WHERE $cond")->execute()->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function first() {
        if(!empty($this->generateRequest())) {
            return $this->generateRequest()[0];
        }
    }

    public function get() {
        return $this->generateRequest();
    }
}