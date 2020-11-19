<?php

$login = function () use ($conn) {
    $email = filter_input(INPUT_POST, 'email');
    $passwd = filter_input(INPUT_POST, 'passwd');

    if (!$email or !$passwd) {
        return false;
    }

    $sql = "SELECT email, password FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        return false;
    }

    if (password_verify($passwd, $user['password'])) {
        unset($user['password']);
        $_SESSION['auth'] = $user;
        return true;
    }

    return false;

};