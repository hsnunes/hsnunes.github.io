<?php

$login = function () use ($conn) {
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');

    if (!$email or !$passwd) {
        return false;
    }

    $sql = "SELECT email, senha FROM acesso WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        return false;
    }

    if (password_verify($senha, $user['senha'])) {
        unset($user['senha']);
        $_SESSION['authOk'] = $user;
        return true;
    }

    return false;

};