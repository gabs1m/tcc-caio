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
        <img src="imgs/perfil.png" alt="img_perfil"/>
        <img class="img_editar_foto" src="imgs/img_edit.png" alt="img_edita"/>
        <a href="#" class="editar">Editar</a></li>
      </div>
      <div class="nome_user">
        <p>Bruna Dayane de Oliveira</p>
        <hr class="linha-horizontal">
        <div class="eventos_salvos">
          <a href="/favoritos" class="meu-link">
            <img class="img_edita" src="imgs/icon_salvar.png" alt="img_edita"/>
            <p class="events_salvos">Eventos salvos</p>
          </a>
        </div>
        <hr class="linha-horizontal"> 
      </div>
    </div>
   
    <?php include 'componentes/Rodape.php'; ?>
    
    <script src="acao.js"></script>
  </body>
</html>