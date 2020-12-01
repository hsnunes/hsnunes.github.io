<?php

function gaplicacoes_get_data($redirectOnError) {
    $aplicacao = filter_input(INPUT_POST, 'aplicacao');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $motivo = filter_input(INPUT_POST, 'motivo');
    $branch = filter_input(INPUT_POST, 'branch');
    $status = filter_input(INPUT_POST, 'status');

    if(!$aplicacao and !$status) {
        flash('Preencha o campos aplicação e Status são obrigatórios', 'error');
        header('location: '.$redirectOnError);
        die();
    }

    return compact('aplicacao', 'descricao', 'motivo', 'branch', 'status');
}

$gaplicacoes_all = function () use ($conn) {
    $result = $conn->query("SELECT * FROM gerente_aplicacoes");
    return $result->fetch_all(MYSQLI_ASSOC);
};

$gaplicacoes_one = function ($id) use ($conn) {
    $sql = "SELECT * FROM gerente_aplicacoes WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

$gaplicacoes_create = function () use ($conn) {
    $data = user_get_data('/admin/gaplicacoes/create');

    if (!$data['passwd']) {
        flash('Campo Senha Obrigatório', 'error');
        header('location: /admin/gaplicacoes/create');
        die();
    }

    $sql = "INSERT INTO gerente_aplicacoes (aplicacao, descricao, motivo, branch, status, created, updated) 
            VALUES (?, ?, ?, ?, ?, now(), now())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $data['aplicacao'], $data['descricao'], $data['motivo'], $data['branch'], $data['status']);

    flash('Aplicação adicionada', 'success');

    return $stmt->execute();
};

$gaplicacoes_edit = function ($id) use ($conn) {
    $data = user_get_data('/admin/gaplicacoes/'.$id);

    $sql = "UPDATE gerente_aplicacoes SET aplicacao=?, descricao=?, motivo=?, branch=?, status=?, updated=now() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $data['aplicacao'], $data['descricao'], $data['motivo'], $data['branch'], $data['status'], $id);

    flash('Aplicação Atualizada!', 'success');
    return $stmt->execute();

};

$gaplicacoes_delete = function ($id) use ($conn) {
    $sql = "DELETE FROM gerente_aplicacoes WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Aplicação Removidas!', 'success');
    return $stmt->execute();
};