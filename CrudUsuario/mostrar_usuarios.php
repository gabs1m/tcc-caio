<?php
require "../conexaoBD.php";
$XUsuario = "SELECT Nome, idUsuario FROM Usuario";
$resulUsuario = mysqli_query($conexao, $XUsuario);

    while ($Usuario = mysqli_fetch_assoc($resulUsuario)): ?>
    <tr>
            <td><?=$Usuario["Nome"]?></td>
            <td><a href="editeUsuario.php?id=<?=$Usuario['idUsuario']?>">Atualizar</a>
    </tr>
    <?php endwhile ?>  