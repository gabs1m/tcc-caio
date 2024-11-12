<?php

namespace App\Providers;
use Exception;

class HTTPService {
  public function __construct() {}

  public function fetchGet($currentFile = null) {
    try {
      $request = [];
      foreach($_GET as $key => $value) {
        $request[$key] = $value;
      }
      return $request;
    } catch(Exception $erro) {
      echo $erro->getMessage();
    }
  }

  public function fetchPost($paginaAtual = null) {
    try {
      $request = [];
      foreach($_POST as $chave => $valor) {
        $request[$chave] = $valor;
      }
      return $request;
    } catch(Exception $erro) {
      echo $erro->getMessage();
    }
  }

  public function fetchRequest(){
    try{
      $request = [];
      foreach($_REQUEST as $chave => $valor) {
        $request[$chave] = $valor;
      }
      return $request;
    } catch(Exception $erro) {
      echo $erro->getMessage();
    }
  }

  public function setSession($array = []){
    foreach($array as $key => $value){
      $_SESSION[$key] = $value;
    }
  }
  public function fetchSession(){
    return $_SESSION;
  }
}

?>