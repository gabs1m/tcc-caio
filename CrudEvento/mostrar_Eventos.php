<?php
require "../conexaoBD.php";
$XEvento = "SELECT Nome, idEvento FROM Evento";
$resulEvento = mysqli_query($conexao, $XEvento);

    while ($evento = mysqli_fetch_assoc($resulEvento)): ?>
    <tr>
            <td><?=$evento["Nome"]?></td>
            <td><a href="editeEvento.php?id=<?=$evento['idEvento']?>">Atualizar</a>
    </tr>
    <?php endwhile ?>  

