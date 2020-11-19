<?php

// Criando uma funcionalidade de templates
function render($content, $template, array $data = []) {
    $contentTpl = __DIR__ . '/../templates/'. $template .'/'. $content . '.tpl.php';
    $contentAjx = __DIR__ . '/../templates/'. $content . '.tpl.php';
    $content = $template == 'ajax' ? $contentAjx : $contentTpl;

    return include __DIR__ . '/../templates/'. $template . '.tpl.php';
}