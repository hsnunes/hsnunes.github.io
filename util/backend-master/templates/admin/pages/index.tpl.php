<div class="container">
<h3 class="m-3">Gerencia de Paginas</h3>

<table class="table table-hover mb-2">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['pages'] as $page): ?>
        <tr>
            <td><?php echo $page['id']; ?></td>
            <td> <a href="/admin/pages/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a> </td>
            <td class="text-right">
                <a href="/admin/pages/<?php echo $page['id']; ?>/edit" class="btn btn-primary">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin/pages/create" class="btn btn-primary">Novo</a>
</div>