<div class="container">
<h3 class="m-3">Edição de Usuários</h3>

<form action="#" method="POST">
    <div class="form-group">
        <label for="emailUsers">Email</label>
        <input value="<?php echo $data['usuario']['email']; ?>" name="email" id="emailUsers" type="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="loginUsers">Login</label>
        <input value="<?php echo $data['usuario']['username']; ?>" name="username" id="loginUsers" type="text" class="form-control" placeholder="Seu Login">
    </div>
    <div class="form-group">
        <label for="passwdUsers">Senha</label>
        <input name="passwd" id="passwdUsers" type="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="/admin/usuarios" class="btn btn-secondary">Usuários</a>
</form>


</div>