<?php session_start() ?>

<?php $favoritos = $_SESSION['favoritos']; ?>

<?php foreach($favoritos as $favorito): ?>
<h2><?=$favorito->getNome()?></h2>
<?php endforeach ?>

<a href="/">Voltar</a>