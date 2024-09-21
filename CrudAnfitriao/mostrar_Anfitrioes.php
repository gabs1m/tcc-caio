<?php
require"../conexaoBD.php";
$XAnfitriao = "SELECT Nome, idAnfitriao FROM Anfitriao";
$resulAnfitrião = mysqli_query($conexao, $XAnfitriao);

    while ($Anfitriao = mysqli_fetch_assoc($resulAnfitrião)): ?>
    <tr>
            <td><?=$Anfitriao["Nome"]?></td>
            <td><a href="editeAnfitriao.php?id=<?=$Anfitriao['idAnfitriao']?>">Atualizar</a>
    </tr>
    <?php endwhile ?>  

