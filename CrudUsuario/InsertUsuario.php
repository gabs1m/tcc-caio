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
 
$X = "INSERT INTO usuario(Nome, Data_Nascimento, Telefone, Cpf, Email, Senha, Genero, Imagem) VALUES(\"$nome\",  \"$data\",   \"$telefone\", \"$cpf\", \"$email\", \"$senha\", \"$genero\", \"$to\")";

$resul = mysqli_query($conexao, $X);
if($resul==true){
    echo "Cliente cadastrado com sucesso!";

}else{
    echo mysqli_error($conexao);
}
?>
<br>
<a href="mostrar_usuarios.php">Ver todos os clientes cadastrados</a>