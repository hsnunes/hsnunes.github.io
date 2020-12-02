<?php

require __DIR__ . '/db.php';

if (resolve('/admin/usuarios/?')) {
    $usuarios = $usuarios_all();
    render('usuarios/index', 'admin', ['usuarios' => $usuarios]);

} elseif (resolve('/admin/usuarios/create')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuarios_create();
        return header('location: /admin/usuarios');
    }
    render('usuarios/create', 'admin');

} elseif ($params = resolve('/admin/usuarios/(\d+)')) {
    $usuario = $usuarios_one($params[1]);
    render('usuarios/view', 'admin', ['usuario' => $usuario]);

} elseif ($params = resolve('/admin/usuarios/(\d+)/edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuarios_edit($params[1]);
        return header('location: /admin/usuarios/'. $params[1]);
    }
    $usuario = $usuarios_one($params[1]);
    render('usuarios/edit', 'admin', ['usuario' => $usuario]);

} elseif ($params = resolve('/admin/usuarios/(\d+)/delete')) {
    $usuarios_delete($params[1]);
    return header('location: /admin/usuarios');
}