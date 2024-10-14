<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/assets/estilos/perfil_user.css" />
    <title>Menu Responsivo</title>
  </head>

  <body>
    <?php include 'componentes/Cabecalho.php'; ?>

    <div class="perfil">
      <div class="perfil_user">
        <img src="imgs/perfil.png" alt="img_perfil" />
        <img class="img_editar_foto" src="imgs/img_edit.png" alt="img_edita" />
        <a href="#" class="editar">Editar</a>
      </div>
      <div class="nome_user">
        <p>Bruna Dayane de Oliveira</p>
        <hr class="linha-horizontal" />
        <div class="eventos_salvos">
          <a
            href="/favoritos"
            class="meu-link"
          >
            <img class="img_edita" src="imgs/icon_salvar.png" alt="img_edita" />
            <p class="events_salvos">Eventos salvos</p>
          </a>
        </div>
        <hr class="linha-horizontal" />
        <div class="criando_events">
          <a
            href="https://brasilescola.uol.com.br/historiag/feudalismo.htm"
            class="meu-link"
          >
            <img
              class="mais_eventos"
              src="imgs/mais_evento.png"
              alt="tag_mais_eventos"
            />
            <p class="criar_eventos">Criar evento</p>
          </a>
        </div>
        <hr class="linha-horizontal" />
      </div>
    </div>
    <h2 class="eventos">Meus eventos</h2>
    <div class="meu_evento">
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
      <div class="caixinha">
        <img class="img_capa" src="imgs/dog.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p>Feira de adoção</p>
          <img src="imgs/lapis_editar.png" />
          <img src="imgs/lixeira.png" />
        </div>
      </div>
    </div>
   
    <?php include 'componentes/Rodape.php'; ?>
    
    <script src="acao.js"></script>
  </body>
</html>