<?php
require"../conexaoBD.php";

$nome=$_POST["nome"];
$telefone=$_POST["telefone"];
$cnpj=$_POST["cnpj"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$img=$_FILES["ImagemAnfitriao"];
    $from = $img["tmp_name"];
    $nomeImagem = $img["name"];
    $to = "../imagens/$nomeImagem";
    $resul=move_uploaded_file($from, $to);
        if($resul==false){
        echo"Não rolou o insert da imagem";
    }
$id = $_POST['id'];

$update = "UPDATE Anfitriao SET Nome = '$nome', Telefone = '$telefone', Cnpj = '$cnpj', Email = '$email', Senha = '$senha', Imagem = '$to' WHERE idAnfitriao = '$id'";

if(mysqli_query($conexao, $update)){
    echo "Cadastro atualizado com sucesso!";
} else{
    echo "ERRO: <br>".mysqli_error($conexao);
}
?>
<br>
<a href="">ESSA PÁGINA TEM QUE IR PARA ALGUM LUGAR</a>
