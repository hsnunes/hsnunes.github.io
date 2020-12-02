<div class="container">
<h3 class="m-3">Gerencia de Usuários</h3>

<table class="table table-hover mb-2">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['usuarios'] as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td> <a href="/admin/usuarios/<?php echo $user['id']; ?>"><?php echo $user['email']; ?></a> </td>
            <td> <a href="/admin/usuarios/<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a> </td>
            <td class="text-right">
                <a href="/admin/usuarios/<?php echo $user['id']; ?>/edit" class="btn btn-primary">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin/usuarios/create" class="btn btn-primary">Novo</a>
</div>