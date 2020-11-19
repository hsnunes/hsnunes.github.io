<?php

function get_user() {
    return $_SESSION['auth'] ?? null;
};

function auth_protection() {
    $user = get_user();

    if (!$user and !resolve('/admin/auth.*')) {
        flash('Area Administrativa! Faça autenticação.','warning');
        header('location: /admin/auth/login');
        die();
    }

};

function logout() {
    unset($_SESSION['auth']);
    flash('Disconect!', 'info');
    header('location: /admin/auth/login');
    die();
}