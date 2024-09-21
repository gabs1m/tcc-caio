<?php

$conexao=mysqli_connect("localhost", "root", "", "PeaceFun");

if(!$conexao){
    echo "ERRO". mysqli_connect_error();
}

?>