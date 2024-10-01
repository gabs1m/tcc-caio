<?php 
session_start();
?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="/assets/estilos/index.css">

    <title>Peace&Fun</title>
  </head>

  <body>
    <?php include 'componentes/Cabecalho.php'; ?>

    <?php if(isset($_SESSION[$_SESSION['tipo']])): ?>
    <h1>Bem vindo, <?=$_SESSION[$_SESSION['tipo']]->getNome()?></h1>
    <?php endif; ?>

    <?php if(isset($_SESSION[$_SESSION['tipo']])): ?>
    <form action="/logout" method="get">
      <button type="submit">Sair</button>
    </form>
    <?php endif; ?>

    <div class="corpo">
      <?php for($i = 0; $i < 10; $i++): include 'componentes/Card.php'; endfor; ?>
    </div>

    <?php include 'componentes/Rodape.php'; ?>

    <script src="acao.js"></script>
  </body>
</html>