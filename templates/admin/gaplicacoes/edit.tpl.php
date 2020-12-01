<div class="container">
<h3 class="m-3">Gerencia de Aplicações</h3>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/admin/gaplicacoes">G. Aplicação</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>

<form action="#" method="post">

    <div class="form-group">
        <label for="aplicacao">Aplicação</label>
        <input value="<?php echo $data['gaplicacoes']['aplicacao']; ?>" name="aplicacao" id="aplicacao" type="text" class="form-control" placeholder="Nome da Aplicação">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input value="<?php echo $data['gaplicacoes']['descricao']; ?>" name="descricao" id="descricao" type="text" class="form-control" placeholder="Descrição Aplicação">
    </div>
    <div class="form-group">
        <label for="motivo">Motivo</label>
        <input value="<?php echo $data['gaplicacoes']['motivo']; ?>" name="motivo" id="motivo" type="text" class="form-control" placeholder="Motivo Aplicação">
    </div>
    <div class="form-group">
        <label for="branch">Branch</label>
        <input value="<?php echo $data['gaplicacoes']['branch']; ?>" name="branch" id="branch" type="text" class="form-control" placeholder="Branch Aplicação">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input value="<?php echo $data['gaplicacoes']['status']; ?>" name="status" id="status" type="text" class="form-control" placeholder="Status da Aplicação">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button> <a href="/admin/gaplicacoes" class="btn btn-primary">Aplicações</a>
</form>

</div>