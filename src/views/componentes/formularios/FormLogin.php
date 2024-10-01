<h2 class="titulo">Login Peace&Fun</h2>

<form method="POST" enctype="multipart/form-data">
  <div class="campo">
    <input type="hidden" name="tipo" value=<?=$tipo?>>
  </div>

  <div class="campo">
    <label>E-mail</label>
    <input type="email" placeholder="Email" name="Email" class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>Senha</label>
    <input type="senha" placeholder="Senha" name="Senha" class="edit-inputs">
  </div>

  <br><span>Deseja logar como <a href="/<?=$tipo == 'usuarios' ? 'anfitrioes' : 'usuarios' ?>/login" class="link"><?=$tipo == 'usuarios' ? 'anfitrião' : 'usuário'?></a>?</span><br>
  <br><span>Não possui conta? <a href="/<?=$tipo == 'usuarios' ? 'usuarios' : 'anfitrioes'?>/cadastro">Cadastre-se</a>!</span>
  
  <div class="botao">
    <button type="submit" class="cadast-button">Entrar</button>
  </div>
</form>