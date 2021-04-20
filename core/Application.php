<?php

namespace Core;

final class Application
{
    // Наш роутер
    public $router;
    public $request;
    public $view;
    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
    }

    public function run()
    {
        // При старте нашего приложения стартуем роутинг
        $this->router = new Route($this->request);
    }
}