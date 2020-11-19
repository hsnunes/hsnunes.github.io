<?php

require __DIR__ . '/db.php';

if (resolve('/admin/users/?')) {
    $users = $users_all();
    render('users/index', 'admin', ['users' => $users]);

} elseif (resolve('/admin/users/create')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $users_create();
        return header('location: /admin/users');
    }
    render('users/create', 'admin');

} elseif ($params = resolve('/admin/users/(\d+)')) {
    $user = $users_one($params[1]);
    render('users/view', 'admin', ['user' => $user]);

} elseif ($params = resolve('/admin/users/(\d+)/edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $users_edit($params[1]);
        return header('location: /admin/users/'. $params[1]);
    }
    $user = $users_one($params[1]);
    render('users/edit', 'admin', ['user' => $user]);

} elseif ($params = resolve('/admin/users/(\d+)/delete')) {
    $users_delete($params[1]);
    return header('location: /admin/users');
}