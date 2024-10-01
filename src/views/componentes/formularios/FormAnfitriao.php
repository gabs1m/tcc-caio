<h2 class="titulo">Cadastro anfitrião</h2>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value=<?=$id?>>

  <div class="campo">
    <label>Nome</label>
    <input name="Nome" type="text" placeholder="Nome"  class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>CNPJ</label>
    <input name="DocumentoIdentidade" type="text" placeholder="CPF"  class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>Telefone</label>
    <input name="Telefone" type="text" placeholder="Telefone" class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>E-mail</label>
    <input name="Email" type="email"placeholder="E-mail"  class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>Senha</label>
    <input type="Senha" placeholder="Senha"  class="edit-inputs" name="Senha">
  </div><br>

  <div class="campo">
    <label>Imagem</label>
    <input type="file" name="Imagem" id=" " placeholder="Ex: ">
  </div><br>

  <div>
    <button type="submit" class="cadast-button">Cadastrar</button>
  </div>
</form>