<?php

use Core\Session;
use Core\View;
use Core\Redirect;

// Функция дебагинга, для более просто работы
function dump(...$params)
{
    echo '<pre>';
    foreach ($params as $param) {
        var_dump($param);
    }
    echo '</pre>';
}

// Рендер шаблона
function view($title, $params = [])
{
    View::$section_template = View::ob_view(View::$path_to_view . $title . ".php", $params);
    if(View::$layout_path) {
        $replaceableCount = preg_match("/<section class='section_replacer_template'>[a-zA-Z\d\s=\"'-?:;_#<>а-яёА-Я\/]*<\/section>/u", View::$section_template, $replaceable);
        View::$section_template = preg_replace("/<section class='section_replacer_template'>[a-zA-Z\d\s=\"'-?:;_#<>а-яёА-Я\/]*<\/section>/u", '', View::$section_template);
        echo str_replace("{{ section }}", $replaceable[0], View::$section_template);
    } else {
        echo View::$section_template;
    }
}

function redirect($name) {
    Redirect::url($name);
}

function back() {
    return Redirect::back();
}

function flash($name) {
    if(Session::has($name)) {
        $session = Session::get($name);
        Session::clear($name);
        
        return $session;
    }
    return '';
}

function error($name) {
    if(Session::has('errors')) {
        return Session::get('errors')[$name][0];
    }
}

function session($name) {
    return Session::get($name);
}

function hasSession($name) {
    return Session::has($name);
}

function hasError($name) {
    if(Session::has('errors')) {
        return isset(Session::get('errors')[$name]);
    }
}

// Отнаследоваться от базового шаблона
function extendsLayout($template)
{
    require_once View::setLayout($template);
}
// Открываем секцию
function sectionTemplate()
{
    echo "<section class='section_replacer_template'>";
}
// Закрываем секцию
function endSectionTemplate()
{
    echo '</section>';
}
// Секция в базовом шаблоне куда будем вставлять
function yieldTemplate($section)
{
    echo "{{ $section }}";
}
