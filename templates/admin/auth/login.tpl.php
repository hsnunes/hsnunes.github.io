<style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<form class="form-signin" method="POST">
  <img class="mb-4" src="/img/admLogo.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Administração</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Senha</label>
  <input name="passwd" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Acesso</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>