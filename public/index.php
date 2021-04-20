<?php
// Путь до корня нашего приложения
define("APP_DIR",dirname(__DIR__, 1));

// Подкючаем автозагрузку классов
require_once APP_DIR . "/autoload.php";

// Подключаем хелперы
require_once APP_DIR . "/helpers.php";

// Подкючаем наш Application
use Core\Application;
$app = new Application();

$app->run();