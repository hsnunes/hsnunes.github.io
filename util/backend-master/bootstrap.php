<?php

session_start();

require __DIR__ . '/config.php';
require __DIR__ . '/src/connection.php';
require __DIR__ . '/src/error_handler.php';
require __DIR__ . '/src/resolve-router.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/flash.php';
require __DIR__ . '/src/auth.php';

// Verifica as rotas do usuário e encaminha para os diretorios seguintes
if (resolve('/admin/?(.*)')) {
    // Arquivo de Rotas, responável pelas rotas de Administração
    require __DIR__ . '/admin/routes.php';
}elseif (resolve('/(.*)')) {
    // Arquivo de Rotas, responável pelas rotas do Site
    require __DIR__ . '/site/routes.php';
}