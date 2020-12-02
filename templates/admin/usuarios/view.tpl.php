<div class="container">
<h3 class="m-3">Visualização de Usuários</h3>


<div class="row">
    <div class="col-3">
        <dl class="row">
            <dt class="col-sm-4">Login</dt>
            <dd class="com-sm-8"><?php echo $data['usuario']['username']; ?></dd>

            <dt class="col-sm-4">Email</dt>
            <dd class="com-sm-8"><?php echo $data['usuario']['email']; ?></dd>

            <dt class="col-sm-4">Criação</dt>
            <dd class="com-sm-8"><?php echo $data['usuario']['created']; ?></dd>

            <dt class="col-sm-4">Atualização</dt>
            <dd class="com-sm-8"><?php echo $data['usuario']['updated']; ?></dd>
        </dl>
    </div>
    <div class="col bg-light">
        <h3><?php echo $data['usuario']['email']; ?></h3>
        <p><?php echo $data['usuario']['username']; ?></p>
    </div>

</div>

<a href="/admin/usuarios/<?php echo $data['usuario']['id']; ?>/edit" class="btn btn-warning">Editar</a>
<a href="/admin/usuarios/<?php echo $data['usuario']['id']; ?>/delete" class="btn btn-danger confirm">Excluir</a>
<a href="/admin/usuarios" class="btn btn-primary">Usuários</a>
</div>