<?php

use Core\View;

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
function view($title)
{
    View::$section_template = View::ob_view(View::$path_to_view . $title . ".php");
    if(View::$layout_path) {
        $replaceableCount = preg_match("/<section class='section_replacer_template'>[a-zа-яё\d\s<>а-яА-Я\/]*<\/section>/u", View::$section_template, $replaceable);
        View::$section_template = preg_replace("/<section class='section_replacer_template'>[a-zа-яё\d\s<>а-яА-Я\/]*<\/section>/u", '', View::$section_template);
        echo str_replace("{{ section }}", $replaceable[0], View::$section_template);
    } else {
        echo View::$section_template;
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
