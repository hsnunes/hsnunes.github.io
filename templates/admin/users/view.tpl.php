<div class="container">
<h3 class="m-3">Visualização de Usuários</h3>

<?php
//var_dump($data);die;
?>


<div class="row">
    <div class="col-3">
        <dl class="row">
            <dt class="col-sm-4">Login</dt>
            <dd class="com-sm-8"><?php echo $data['user']['login']; ?></dd>

            <dt class="col-sm-4">Email</dt>
            <dd class="com-sm-8"><?php echo $data['user']['email']; ?></dd>

            <dt class="col-sm-4">Criação</dt>
            <dd class="com-sm-8"><?php echo $data['user']['created']; ?></dd>

            <dt class="col-sm-4">Atualização</dt>
            <dd class="com-sm-8"><?php echo $data['user']['updated']; ?></dd>
        </dl>
    </div>
    <div class="col bg-light">
        <h3><?php echo $data['user']['email']; ?></h3>
        <p><?php echo $data['user']['login']; ?></p>
    </div>

</div>

<a href="/admin/users/<?php echo $data['user']['id']; ?>/edit" class="btn btn-warning">Editar</a>
<a href="/admin/users/<?php echo $data['user']['id']; ?>/delete" class="btn btn-danger confirm">Excluir</a>
<a href="/admin/users" class="btn btn-primary">Usuários</a>
</div>