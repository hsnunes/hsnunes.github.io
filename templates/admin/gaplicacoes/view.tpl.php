<div class="container">
<h3 class="m-3">Gerencia de Aplicações</h3>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/admin/gaplicacoes">G. Aplicação</a></li>
    <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
  </ol>
</nav>

<div class="row">

    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
    <div class="card-header"><?php echo $data['gaplicacoes']['aplicacao']; ?></div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $data['gaplicacoes']['status']; ?></h5>
        <p class="card-text">
            <?php echo $data['gaplicacoes']['descricao']; ?><br />
            <?php echo $data['gaplicacoes']['branch']; ?> - <?php echo $data['gaplicacoes']['criado']; ?> - <?php echo $data['gaplicacoes']['atualizado']; ?>
        </p>
    </div>
    </div>

</div>

<a href="/admin/gaplicacoes/<?php echo $data['gaplicacoes']['id']; ?>/edit" class="btn btn-warning">Editar</a>
<a href="/admin/gaplicacoes/<?php echo $data['gaplicacoes']['id']; ?>/delete" class="btn btn-danger confirm">Excluir</a>
<a href="/admin/gaplicacoes" class="btn btn-primary">páginas</a>
</div>