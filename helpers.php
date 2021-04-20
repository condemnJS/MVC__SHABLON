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
    include_once View::$path_to_view . $title . ".php";
}

function extendsLayout($template)
{
//    var_dump(View::setLayout($template));
    require_once View::setLayout($template);
}

function sectionTemplate()
{
    echo '</section class="tatar_section">';
}

function endSectionTemplate()
{
    echo '</section>';
}

function yieldTemplate($section)
{
    
}
