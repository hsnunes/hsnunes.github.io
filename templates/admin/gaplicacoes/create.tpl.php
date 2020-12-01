<div class="container">
<h3 class="m-3">Gerencia de Aplicações</h3>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/admin/gaplicacoes">G. Aplicação</a></li>
    <li class="breadcrumb-item active" aria-current="page">Criar</li>
  </ol>
</nav>

<form action="#" method="POST">
    <div class="form-group">
        <label for="aplicacao">Aplicação</label>
        <input name="aplicacao" id="aplicacao" type="text" class="form-control" placeholder="Nome da Aplicação">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input name="descricao" id="descricao" type="text" class="form-control" placeholder="Descrição Aplicação">
    </div>
    <div class="form-group">
        <label for="motivo">Motivo</label>
        <input name="motivo" id="motivo" type="text" class="form-control" placeholder="Motivo Aplicação">
    </div>
    <div class="form-group">
        <label for="branch">Branch</label>
        <input name="branch" id="branch" type="text" class="form-control" placeholder="Branch Aplicação">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input name="status" id="status" type="text" class="form-control" placeholder="Status da Aplicação">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="/admin/gaplicacoes" class="btn btn-secondary">Aplicações</a>
</form>


</div>