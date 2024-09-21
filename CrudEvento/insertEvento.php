<?php
require"../conexaoBD.php";

$nome=$_POST["nome"];
$descricao=$_POST["descricao"];
$data=$_POST["data"];
$categoria=$_POST["categoria"];
$local=$_POST["local"];
$rua=$_POST["rua"];
$bairro=$_POST["bairro"];
$img=$_FILES["imagemEvento"];
    $from = $img["tmp_name"];
    $nomeImagem = $img["name"];
    $to = "../imagens/$nomeImagem";
    $resul=move_uploaded_file($from, $to);
        if($resul==false){
        echo"Não rolou o insert da imagem";
    }
$X = "INSERT INTO Evento(Nome, Descricao, Data_Evento, Categoria, Local_Evento, Rua, Bairro, Imagem) VALUES(\"$nome\", \"$descricao\", \"$data\", \"$categoria\", \"$local\", \"$rua\", \"$bairro\", \"$to\")";

$resul = mysqli_query($conexao, $X);
if($resul==true){
    echo "Cliente cadastrado com sucesso!";
}else{
     echo mysqli_error($conexao);
}
?>
<a href="mostrar_Eventos.php">Ver todos os eventos cadastrados</a>