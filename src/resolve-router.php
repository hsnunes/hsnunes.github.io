<?php

// Criando Rotas para consultas
function resolve($route) {
    // Pega a requisição passada pelo usuario, no navegador
    $path = $_SERVER['PATH_INFO'] ?? '/';

    $route = '/^'. str_replace('/', '\/', $route) .'$/';

    if(preg_match($route, $path, $params)) {
        return $params;
    }
    return false;
}