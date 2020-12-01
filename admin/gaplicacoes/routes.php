<?php

require __DIR__ . '/db.php';

if (resolve('/admin/gaplicacoes/?')) {
    $gaplicacoes = $gaplicacoes_all();
    render('gaplicacoes/index', 'admin', ['gaplicacoes' => $gaplicacoes]);

} elseif (resolve('/admin/gaplicacoes/create')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gaplicacoes_create();
        return header('location: /gaplicacoes/gaplicacoes');
    }
    render('gaplicacoes/create', 'admin');

} elseif ($params = resolve('/admin/gaplicacoes/(\d+)')) {
    $gaplicacoes = $gaplicacoes_one($params[1]);
    render('gaplicacoes/view', 'admin', ['gaplicacoes' => $gaplicacoes]);

} elseif ($params = resolve('/admin/gaplicacoes/(\d+)/edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gaplicacoes_edit($params[1]);
        return header('location: /admin/gaplicacoes/'. $params[1]);
    }
    $gaplicacoes = $gaplicacoes_one($params[1]);
    render('gaplicacoes/edit', 'admin', ['gaplicacoes' => $gaplicacoes]);

} elseif ($params = resolve('/admin/gaplicacoes/(\d+)/delete')) {
    $gaplicacoes_delete($params[1]);
    return header('location: /admin/gaplicacoes');
}