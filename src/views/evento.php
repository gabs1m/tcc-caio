<h1><?=$evento->getNome()?></h1>

<?php

if(array_key_exists('tipo', $_SESSION)):
?>

<br><br><a href="/favoritos/adicionar?id=<?=$evento->getIdEvento()?>">Adicionar evento aos favoritos</a>

<?php endif; ?>