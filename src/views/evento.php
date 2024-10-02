<?php
print_r($evento);

if(isset($_SESSION[$_SESSION['tipo']])):
?>

<br><br><a href="/favoritos/adicionar?id=<?=$evento->getIdEvento()?>">Adicionar evento aos favoritos</a>

<?php endif; ?>