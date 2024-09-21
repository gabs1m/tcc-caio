<?php
require"../conexaoBD.php";

$nome=$_POST["Nome"];
$descricao=$_POST["descricao"];
$data=$_POST["data"];
$categoria=$_POST["categoria"];
$local=$_POST["local"];
$rua=$_POST["rua"];
$bairro=$_POST["bairro"];
$img=$_POST["imagemAnfitriao"];
    $from = $img["tmp_name"];
    $nomeImagem = $img["name"];
    $to = "../imagens/$nomeImagem";
    $resul=move_uploaded_file($from, $to);
        if($resul==false){
        echo"Não rolou o insert da imagem";
    }
$id = $_POST['id'];


$update = "UPDATE cliente SET Nome = '$nome', Descricao = '$descricao', Data_Evento = '$data', Categoria = '$categoria', Local_Evento = '$local', Rua = '$rua', Bairro = '$bairro', Imagem = '$to' WHERE idEvento = '$id'";

$resul = mysqli_query($conexao, $update);
if($resul==true){
    echo "Cliente cadastrado com sucesso!";
}else{
     echo mysqli_error($conexao);
}
?>