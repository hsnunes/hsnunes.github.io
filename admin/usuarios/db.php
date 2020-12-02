<?php

function user_get_data($redirectOnError) {
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'passwd');

    if(!$email) {
        flash('Preencha o campos email obrigatório', 'error');
        header('location: '.$redirectOnError);
        die();
    }

    return compact('email', 'username', 'passwd');
}

$usuarios_all = function () use ($conn) {
    $result = $conn->query("SELECT * FROM usuarios");
    return $result->fetch_all(MYSQLI_ASSOC);
};

$usuarios_one = function ($id) use ($conn) {
    $sql = "SELECT * FROM usuarios WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

$usuarios_create = function () use ($conn) {
    $data = user_get_data('/admin/usuarios/create');

    if (!$data['passwd']) {
        flash('Campo Senha Obrigatório', 'error');
        header('location: /admin/usuarios/create');
        die();
    }

    $sql = "INSERT INTO usuarios (email, username, passwd, created, updated) 
    VALUES (?, ?, ?, now(), now())";
    $stmt = $conn->prepare($sql);
    $passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $data['email'], $data['username'], $passwd);

    flash('Criou Usuário com Sucesso', 'success');

    return $stmt->execute();
};

$usuarios_edit = function ($id) use ($conn) {
    $data = user_get_data('/admin/usuarios/'.$id);

    if ($data['passwd']) {
        $sql = "UPDATE usuarios SET email=?, username=?, passwd=?, updated=now() WHERE id=?";
    } else {
        $sql = "UPDATE usuarios SET email=?, username=?, updated=now() WHERE id=?";
    }
    $stmt = $conn->prepare($sql);

    if ($data['passwd']) {
        $passwd = password_hash($data['passwd'], PASSWORD_DEFAULT);
        $stmt->bind_param('sssi', $data['email'], $data['username'], $passwd, $id);
    }else {
        $stmt->bind_param('ssi', $data['email'], $data['username'], $id);
    }

    flash('Usuário Atualizado!', 'success');
    return $stmt->execute();

};

$usuarios_delete = function ($id) use ($conn) {
    $sql = "DELETE FROM usuarios WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Usuário Excluído!', 'success');
    return $stmt->execute();
};