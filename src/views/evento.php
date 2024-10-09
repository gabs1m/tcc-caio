<h1><?=$evento->getNome()?></h1>

<?php

if(isset($_SESSION[$_SESSION['tipo']])):
?>

<br><br><a href="/favoritos/adicionar?id=<?=$evento->getIdEvento()?>">Adicionar evento aos favoritos</a>

<?php endif; ?>