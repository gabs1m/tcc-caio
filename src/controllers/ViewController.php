<?php

namespace App\Controllers;

use App\Classes\Evento;

use App\Controller;
use App\Providers\HTTPService;
use App\Providers\SQLService;

session_start();

class ViewController extends Controller{
  public function index() {
    $this->renderizar('index');
  }

  public function perfil(){
    $sqlService = new SQLService();
    $sqlService->conectar();

    $httpService = new HTTPService();
    $session = $httpService->fetchSession();
    
    $eventos = [];
    $contador = 0;

    if($session['tipo'] == 'anfitrioes'){
      $operacao = 'findOne';
      $tabela = 'evento';
      $colunas = ['idAnfitriao'];
      $valores = [$session['anfitrioes']->getIdAnfitriao()];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      while($linha = $resposta->fetch_assoc()){
        $eventos[$contador] = new Evento(
          $linha['idEvento'],
          $linha['idAnfitriao'],
          $linha['Nome'],
          $linha['Descricao'],
          $linha['DataEvento'],
          $linha['LocalEvento'],
          $linha['Bairro'],
          $linha['Rua'],
          $linha['Categoria'],
          $linha['Imagem']
        );
        $contador++;
      }

      if(!$resposta){
        return false;
      }
      $sqlService->desconectar();
    }

    $this->renderizar('perfil',  [
      'tipo' => $session['tipo'],
      $session['tipo'] => $session[$session['tipo']],
      'eventos' => $eventos
    ]);
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
    $this->renderizar('favoritos', [
      'favoritos' => $_SESSION['favoritos'] || []
    ]);
  }

  public function sobre(){
    $this->renderizar('sobre');
  }
}

?>