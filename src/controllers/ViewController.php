<?php

namespace App\Controllers;

use App\Controller;

class ViewController extends Controller{
  public function index() {
    $this->renderizar('index');
  }

  public function formLogin(){
    $tipo = substr($_SERVER['REQUEST_URI'], 1, -6);
    $this->renderizar('login', ['tipo' => $tipo]);
  }

  public function formCadastro(){
    if(!isset($_REQUEST['id'])){
      $tipo = substr($_SERVER['REQUEST_URI'], 1, -9);
    } else {
      $tipo = substr($_SERVER['REQUEST_URI'], 1, -14);
    }

    $this->renderizar('cadastro', [
      'tipo' => $tipo,
      'id' => $_REQUEST['id']
    ]);
  }

  public function favoritos(){
    $this->renderizar('favoritos');
  }
}

?>