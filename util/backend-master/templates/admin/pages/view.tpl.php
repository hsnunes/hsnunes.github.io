<div class="container">
<h3 class="m-3">Visualização de Paginas</h3>

<div class="row">
    <div class="col-3">
        <dl class="row">
            <dt class="col-sm-4">Título</dt>
            <dd class="com-sm-8"><?php echo $data['page']['title']; ?></dd>

            <dt class="col-sm-4">URL</dt>
            <dd class="com-sm-8"> <a href="<?php echo $data['page']['url']; ?>"><?php echo $data['page']['url']; ?></a></dd>

            <dt class="col-sm-4">Criação</dt>
            <dd class="com-sm-8"><?php echo $data['page']['created']; ?></dd>

            <dt class="col-sm-4">Atualização</dt>
            <dd class="com-sm-8"><?php echo $data['page']['updated']; ?></dd>
        </dl>
    </div>
    <div class="col bg-light">
        <h3><?php echo $data['page']['title']; ?></h3>
        <p><?php echo $data['page']['body']; ?></p>
    </div>

</div>

<a href="/admin/pages/<?php echo $data['page']['id']; ?>/edit" class="btn btn-warning">Editar</a>
<a href="/admin/pages/<?php echo $data['page']['id']; ?>/delete" class="btn btn-danger confirm">Excluir</a>
<a href="/admin/pages" class="btn btn-primary">páginas</a>
</div>