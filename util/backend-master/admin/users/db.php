<?php

function user_get_data($redirectOnError) {
    $email = filter_input(INPUT_POST, 'email');
    $login = filter_input(INPUT_POST, 'login');
    $passwd = filter_input(INPUT_POST, 'passwd');

    if(!$email) {
        flash('Preencha o campos email obrigatório', 'error');
        header('location: '.$redirectOnError);
        die();
    }

    return compact('email', 'login', 'passwd');
}

$users_all = function () use ($conn) {
    $result = $conn->query("SELECT * FROM users");
    return $result->fetch_all(MYSQLI_ASSOC);
};

$users_one = function ($id) use ($conn) {
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

$users_create = function () use ($conn) {
    $data = user_get_data('/admin/user/create');

    if (!$data['passwd']) {
        flash('Campo Senha Obrigatório', 'error');
        header('location: /admin/users/create');
        die();
    }

    $sql = "INSERT INTO users (email, login, password, created, updated) VALUES (?, ?, ?, now(), now())";
    $stmt = $conn->prepare($sql);
    $passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $data['email'], $data['login'], $passwd);

    flash('Criou Usuário com Sucesso', 'success');

    return $stmt->execute();
};

$users_edit = function ($id) use ($conn) {
    $data = user_get_data('/admin/users/'.$id);

    if ($data['passwd']) {
        $sql = "UPDATE users SET email=?, login=?, password=?, updated=now() WHERE id=?";
    } else {
        $sql = "UPDATE users SET email=?, login=?, updated=now() WHERE id=?";
    }
    $stmt = $conn->prepare($sql);

    if ($data['passwd']) {
        $passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);
        $stmt->bind_param('sssi', $data['email'], $data['login'], $passwd, $id);
    }else {
        $stmt->bind_param('ssi', $data['email'], $data['login'], $id);
    }

    flash('Usuário Atualizado!', 'success');
    return $stmt->execute();

};

$users_delete = function ($id) use ($conn) {
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Usuário Excluído!', 'success');
    return $stmt->execute();
};