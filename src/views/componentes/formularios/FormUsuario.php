<h2 class="titulo">Cadastro Usuário</h2>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value=<?=$id?>>

  <div class="campo">
    <label>Nome</label>
    <input type="text" placeholder="Nome" class="edit-inputs" name="Nome">
  </div><br>

  <div class="campo" class="edit-inputs">
    <label>Data de nascimento</label>
    <input type="date" class="edit-date" name="DataNascimento">
  </div><br>

  <div class="campo">
    <label>CPF</label>
    <input type="text" placeholder="CPF" class="edit-inputs" name="Cpf">
  </div><br>

  <div class="campo-genero">
    <label id="genero">Genêro:</label>
    <input type="radio" name="Genero" value="Masculino">Masculino<div class="campo"></div><br>
    <input type="radio" name="Genero" value="Feminino">Feminino<br>
    <input type="radio" name="Genero" value="Outro">Outro<br>
  </div><br>

  <div class="campo">
    <label>Telefone</label>
    <input type="text" placeholder="Telefone" class="edit-inputs" name="Telefone">
  </div><br>

  <div class="campo">
    <label>E-mail</label>
    <input type="text" placeholder="Email" class="edit-inputs" name="Email">
  </div><br>

  <div class="campo">
    <label>Senha</label>
    <input type="senha" placeholder="Senha" class="edit-inputs" name="Senha">
  </div><br>


  <div class="campo">
    <label>Imagem</label>
    <input type="file" name="Imagem" id="" placeholder="Ex: ">
  </div><br>

  <div>
    <button type="submit" class="cadast-button">Cadastrar</button>
  </div>
</form>