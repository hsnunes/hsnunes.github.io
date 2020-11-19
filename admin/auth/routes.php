<?php

require __DIR__ . '/db.php';

if (resolve('/admin/auth/login')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($login()) {
            flash('Administração!', 'success');
            return header('location: /admin');
        };
        flash('Dados Inválidos!', 'error');
    }
    render('auth/login', 'admin');
} elseif (resolve('/admin/auth/logout')) {
    logout();
}