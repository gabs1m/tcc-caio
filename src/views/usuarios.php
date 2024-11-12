<?php session_start() ?>

<?php foreach($usuarios as $usuario): ?>
    <h2><?=$usuario['Nome']?></h2>
    <a href="/usuarios/cadastro?id=<?=$usuario['idUsuario']?>">Editar</a><br>
    <a href="/usuarios/deletar?id=<?=$usuario['idUsuario']?>">Excluir</a><br><br>
<?php endforeach; ?>
