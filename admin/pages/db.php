<?php

// Função para pegar dados do form pages
function page_get_data($redirectOnError) {
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if (!$title or !$url) {
        flash('Preencha os campos Title e Url, são obrigatórios', 'error');
        header('location: '.$redirectOnError);
        die();
    }

    return compact('title', 'url', 'body');
}


$pages_all = function () use ($conn) {
    $result = $conn->query("SELECT * FROM pages");
    return $result->fetch_all(MYSQLI_ASSOC);
};
$pages_one = function ($id) use ($conn) {
    $sql = "SELECT * FROM pages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();

};

$pages_create = function () use ($conn) {
    $data = page_get_data('/admin/pages/create');

    $sql = "INSERT INTO pages (title, url, body, created, updated) VALUES (?, ?, ?, now(), now())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $data['title'], $data['url'], $data['body']);

    flash('Criou registro com sucesso', 'success');

    return $stmt->execute();
};

$pages_edit = function ($id) use ($conn) {
    $data = page_get_data('/admin/pages/' . $id);

    $sql = "UPDATE pages SET title=?, url=?, body=?, updated=now() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $data['title'], $data['url'], $data['body'], $id);

    flash('Atualizou registro com sucesso', 'success');

    return $stmt->execute();
};

$pages_delete = function ($id) use ($conn) {
    $sql = "DELETE FROM pages WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Exclusão registro com sucesso', 'success');
    return $stmt->execute();
};