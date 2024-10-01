<?php

namespace App\Providers;
use Exception;

class SQLService{
  private $conexao;
  public function __construct(){}

  public function conectar(){
    $this->conexao = \mysqli_connect("localhost", "root", "", "peacefun");
    try{
      if(!$this->conexao){
        throw new \Exception("\n\n\nErro de conexão com o banco de dados\n\n\n");
      }
      return $this->conexao;
    } catch(\Exception $erro){
      echo $erro->getMessage();
    }
  }
  public function desconectar(){
    try{
      \mysqli_close($this->conexao);
    } catch(\Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function executar($operacao, $tabela, $colunas = [], $valores = []){
    $query = "";
    $params = "";
    $space = ", ";

    for($i = 1; $i < count($colunas); $i++){
      $params .= "$colunas[$i] = '$valores[$i]'";
      if($i < count($colunas) - 1){
        $params .= $space;
      }
    }
    
    switch($operacao){
      case "create":
        $query = "INSERT INTO $tabela SET $params;";
        break;

      case "find":
        $query = "SELECT * FROM $tabela";
        break;
      
      case "findOne":
        $query = "SELECT * FROM $tabela WHERE $colunas[0] = '$valores[0]';";
        break;

      case "update":
        $query = "UPDATE $tabela SET $params WHERE $colunas[0] = $valores[0];";
        break;

      case "delete":
        $query = "DELETE FROM $tabela WHERE $colunas[0] = $valores[0];";
        break;

      default:
        echo "Operação inválida!";
        break;
    }

    try{
        $resposta = mysqli_query($this->conexao, $query);
        return $resposta;
    } catch(Exception $erro){
        echo $erro->getMessage();
    }
  }
}

?>