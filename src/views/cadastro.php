<?php session_start() ?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Links -->
    <link rel="stylesheet" href="/assets/estilos/index.css">
    <link rel="stylesheet" href="/assets/estilos/cadastAnfitriao.css">
    <link rel="stylesheet" href="/assets/estilos/cadastEvento.css">
    <link rel="stylesheet" href="/assets/estilos/cadastUsuario.css">

    <title>Peace&Fun</title>
  </head>
  
  <body>
    <?php include 'componentes/Cabecalho.php'; ?>

    <?php
      switch($tipo){
        case 'usuarios':
          $form = 'FormUsuario';
          break;
        case 'anfitrioes':
          $form = 'FormAnfitriao';
          break;
        case 'eventos':
          $form = 'FormEvento';
          break;
      }
    ?>

    <div class="posicao-formulario">  
      <div class="formulario-geral">
        <?php include "componentes/formularios/$form.php"; ?>
      </div>
    </div>

    <?php include 'componentes/Rodape.php'; ?>
  </body>
</html>