<div class="container">
<h3 class="m-3">Gerencia de Aplicações</h3>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/admin/gaplicacoes">G. Aplicação</a></li>
  </ol>
</nav>

<table class="table table-hover mb-2">
    <thead>
        <tr>
            <th>Aplicação</th>
            <!-- <th>Descrição</th> -->
            <th>Status</th>
            <!-- <th>Branch</th> -->
            <!-- <th>Ações</th> -->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['gaplicacoes'] as $gapp): ?>
        <tr>
            <td><a href="/admin/gaplicacoes/<?php echo $gapp['id']; ?>"><?php echo $gapp['aplicacao']; ?></a></td>
            <!-- <td><a href="/admin/gaplicacoes/<php echo $gapp['id']; ?>"><php echo gapp['descricao']; ?></a></td> -->
            <td><a href="/admin/gaplicacoes/<?php echo $gapp['id']; ?>"><?php echo $gapp['status']; ?></a></td>
            <!-- <td><a href="/admin/gaplicacoes/<php echo $gapp['id']; ?>"><php echo $gapp['branch']; ?></a></td> -->
            <!-- <td class="text-right">
                <a href="/admin/gaplicacoes/<php echo $gapp['id']; ?>/edit" class="btn btn-primary">Edit</a>
            </td> -->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin/gaplicacoes/create" class="btn btn-primary">Novo</a>
</div>