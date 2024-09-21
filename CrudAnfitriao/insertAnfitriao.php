<?php
require"../conexaoBD.php";

$nome=$_POST["nome"];
$telefone=$_POST["telefone"];
$cnpj=$_POST["cnpj"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$img=$_FILES["imagemAnfitriao"];
    $from = $img["tmp_name"];
    $nomeImagem = $img["name"];
    $to = "../imagens/$nomeImagem";
    $resul=move_uploaded_file($from, $to);
        if($resul==false){
        echo"Não rolou o insert da imagem";
    }

$X = "INSERT INTO Anfitriao(Nome, Telefone, Cnpj, Email, Senha, Imagem) VALUES(\"$nome\", \"$telefone\", \"$cnpj\", \"$email\", \"$senha\", \"$to\")";

$resul = mysqli_query($conexao, $X);
if($resul==true){
    echo "Anfitriao cadastrado com sucesso!";

}else{
    echo mysqli_error($conexao);
}
?>
<br>
<a href="mostrar_Anfitrioes.php">Ver todos os anfitriões cadastrados</a>