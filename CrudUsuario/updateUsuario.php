<?php
require"../conexaoBD.php";

$nome=$_POST["nome"];
$data=$_POST["data"];
$telefone=$_POST["telefone"];
$cpf=$_POST["cpf"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$genero=$_POST["genero"];
$img=$_FILES["ImagemUsario"];
    $from = $img["tmp_name"];
    $nomeImagem = $img["name"];
    $to = "../imagens/$nomeImagem";
    $resul=move_uploaded_file($from, $to);
        if($resul==false){
        echo"Não rolou o insert da imagem";
    }
$id = $_POST['id'];

$update = "UPDATE Usuario SET Nome = '$nome', 
Data_Nascimento = '$data', Telefone = '$telefone', 
Cpf = '$cpf', Email  = '$email', Senha  = '$senha', 
Genero  = '$genero', Email  = '$email', Imagem = '$to' WHERE idUsuario = '$id'";

$resul = mysqli_query($conexao, $update);
if($resul==true){
    echo "Cliente cadastrado com sucesso!";
}else{
     echo mysqli_error($conexao);
}
?>