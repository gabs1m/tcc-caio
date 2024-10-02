<h2 class="titulo">Adicionar evento</h2>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value=<?=$id?>>
  <input type="hidden" name="idAnfitriao" value=<?=$_SESSION['idAnfitriao']?>>

  <div class="campo">
    <label>Nome do evento</label>
    <input type="text" name="Nome" placeholder="Nome do evento"  class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>Descrição do evento</label>
    <input name="Descricao" type="tex-box" placeholder="Descrição" class="edit-inputs">
  </div><br>

  <div class="campo" class="edit-inputs">
    <label>Data</label>
    <input  name="Data" type="date" class="edit-date">
  </div><br>
  
  <div class="campo">
    <label>Local</label>
    <input type="text" name="Local" placeholder="Local"  class="edit-inputs">
  </div><br>
    
  <div class="campo">
    <label>Rua</label>
    <input type="text" name="Rua" placeholder="Rua"  class="edit-inputs">
  </div><br>

  <div class="campo">
    <label>Bairro</label>
    <input type="text" name="Bairro" placeholder="Bairro"  class="edit-inputs">
  </div><br>

  <div class="campo-categoria">
    <label id="genero">Categoria:</label>
    <input type="radio" name="Categoria" value="Esportes">Esportes <div class="campo"></div><br>
    <input type="radio" name="Categoria" value="Tecnologia">Tecnologia<br>
    <input type="radio" name="Categoria" value="Cultura">Cultura<br>
    <input type="radio" name="Categoria" value="Gastronomia">Gastronomia<br>
  </div><br>

  <div class="campo">
    <label>Imagem</label>
    <input type="file" name="Imagem" placeholder="Ex: "  >
  </div><br>

  <div>
    <button type="submit" class="cadast-button">Cadastrar</button>
  </div>
</form>