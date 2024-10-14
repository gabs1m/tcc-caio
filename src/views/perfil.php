<?php session_start() ?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="/assets/estilos/perfil_user.css" /> -->
    <link rel="stylesheet" href="/assets/estilos/perfil_anfitriao.css" />
    <title>Menu Responsivo</title>
  </head>

  <body>
    <?php include 'componentes/Cabecalho.php'; ?>

    <div class="perfil">
      <div class="perfil_user">
        <img src="/assets/imagens/perfil.png" alt="img_perfil"/>
        <img class="img_editar_foto" src="/assets/imagens/img_edit.png" alt="img_edita"/>
        <a href="#" class="editar">Editar</a></li>
      </div>
      <div class="nome_user">
        <p><?=$usuarios ? $usuarios->getNome() : $anfitrioes->getNome()?></p>
        <hr class="linha-horizontal">
        <div class="eventos_salvos">
          <a href="/favoritos" class="meu-link">
            <img class="img_edita" src="/assets/imagens/icon_salvar.png" alt="img_edita"/>
            <p class="events_salvos">Eventos salvos</p>
          </a>
        </div>
        <hr class="linha-horizontal">
        <?php if($anfitrioes): ?>
        <div class="criando_events">
          <a href="/eventos/cadastro" class="meu-link">
            <img
              class="mais_eventos"
              src="/assets/imagens/mais_evento.png"
              alt="tag_mais_eventos"
            />
            <p class="criar_eventos">Criar evento</p>
          </a>
        </div>
        <hr class="linha-horizontal" /> 
        <?php endif ?>
      </div>
    </div>

    <?php if($anfitrioes): ?>
    <h2 class="eventos">Meus eventos</h2>

    <div class="meu_evento">
    <?php foreach($eventos as $evento): ?>
      <div class="caixinha">
        <img class="img_capa" src="/assets/imagens/Nomes-para-cachorro_capa.png" alt="tag_meus_eventos" />
        <div class="itens_editar_excluir">
          <p><?=$evento->getNome()?></p>
          <a href="/eventos/cadastro?id=<?=$evento->getIdEvento()?>"><img src="/assets/imagens/lapis_editar.png" /></a>
          <a href="/eventos/deletar?id=<?=$evento->getIdEvento()?>"><img src="/assets/imagens/lixeira.png" /></a>
        </div>
      </div>
    <?php endforeach ?>
    </div>
    <?php endif ?>

    <?php include 'componentes/Rodape.php'; ?>
    
    <script src="acao.js"></script>
  </body>
</html>