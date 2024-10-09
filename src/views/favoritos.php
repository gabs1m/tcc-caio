<?php session_start() ?>

<?php foreach($_SESSION['favoritos'] as $favorito): ?>
<h2><?=$favorito->getNome()?></h2>
<?php endforeach ?>

<a href="/">Voltar</a>