<?php


namespace Core;


class View
{
    static public $path_to_view = APP_DIR . "/resources/views/";
    static public $layout_path = '';
    static public $section_template = "";

    static public function setLayout($layout)
    {
        return self::$layout_path = self::$path_to_view . $layout . '.php';
    }

    static public function getLayout()
    {
        return self::$layout_path;
    }

    static public function ob_view($template, $params)
    {
        if(!empty($params)) {
            foreach ($params as $key => $param) {
                $$key = $param;
            }
        }
        ob_start();
        include_once $template;
        return ob_get_clean();
    }
}